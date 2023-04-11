<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartVariation;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Product;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Variable;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::where('deleted_at', '=', null)->where('user_id', Auth::user()->id)->get();
        $products = Product::where('deleted_at', null)->orderBy('product_id', 'DESC')->take(50)->get();
        $parentCategories = Category::where('deleted_at', '=', null)->get();
        return view('site.cart.cart', ['items' => $items, 'products' => $products, 'parentCategories' => $parentCategories]);
    }

    public function addToCart(Request $request)
    {
        // $this->validate($request, [
        //     'productId' => 'required|integer',
        //     'variantId' => 'nullable|integer',
        //     'qty' => 'required|integer',
        // ]);

        // try {
        //     if (!Auth::check()) {
        //         return response()->json(['icon' => 'warning', 'title' => 'Please login']);
        //     } elseif ($request->qty > 0) {
        //         $productId = $request->productId;
        //         $variantId = $request->variantId;
        //         $qty = $request->qty;

        //         Cart::create(['product_id' => $productId, 'variant_id' => $variantId, 'qty' => $qty, 'user_id' => Auth::user()->id]);
        //     } else {
        //         return response()->json(['icon' => 'warning', 'title' => 'Please fill the correct quantity']);
        //     }
        // } catch (\Throwable $th) {
        //     return response()->json(['icon' => 'error', 'title' => $th->getMessage()]);
        // }
        // return response()->json(['icon' => 'success', 'title' => 'Added to the Cart']);

        $this->validate($request, [
            'product_id' => 'required',
            'size' => 'required|integer',
            'qty' => 'required|integer',
            'variation_id' => 'required|integer',
        ]);

        if (!Auth::check()) {
            return response()->json(['icon' => 'warning', 'title' => 'Please login']);
        }
        if ($request->qty <= 0) {
            return response()->json(['icon' => 'warning', 'title' => 'Please fill the correct quantity']);
        }

        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $size = $request->size;
        $qty = $request->qty;
        $variant_id = $request->variation_id;
        $variations = [];
        if ($request->has('variation_id')) {
            $variations[] = ['variation_id' => $request->variation_id];
        }
        foreach ($product->productAttr as $key => $attr) {
            $attr = $attr->attribute->name;
            $attr = str_replace(' ', '_', $attr);
            $product_attr_id = $request->$attr;
            if ($product_attr_id != null) {
                $variations[] = ['variation_id' => $product_attr_id];
            }
        }

        try {
            DB::transaction(function () use ($qty, $variations, $product_id, $size ) {
                $carItem = Cart::create(['product_id' => $product_id, 'variant_id' => $size, 'qty' => $qty, 'user_id' => Auth::user()->id]);
                foreach ($variations as $key => $value) {
                    CartVariation::create(['cart_item_id' => $carItem->cart_id, 'variation_id' => $value['variation_id']]);
                }
            });
        } catch (\Throwable $th) {
            return response()->json(['icon' => 'error', 'title' => $th->getMessage()]);
        }
        $count = Cart::where('user_id', Auth::user()->id)->count();
        return response()->json(['icon' => 'success', 'title' => 'Added to the Cart', 'count' => $count]);
    }

    public function removeFromCart(Request $request)
    {
        try {
            DB::transaction(function () use($request) {
                Cart::where('cart_id', $request->id)->where('user_id', Auth::user()->id)->first()->delete();
                CartVariation::where('cart_item_id', $request->id)->delete();
            });
        } catch (\Throwable $th) {
            return response()->json(['remove' => false]);
        }
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $total_price = 0;
        
        foreach ($cart as $key => $item1) {
            $price = $item1->variant->sales_price;
            foreach ($item1->cartVariation as $key => $variation) {
                $price += ($price * $variation->variation->percentage)/100;
            }
            $total_price += $price * $item1->qty;
        }
        $count = Cart::where('user_id', Auth::user()->id)->count();
        return response()->json(['remove' => true, 'total_price' => $total_price, 'count' => $count]);
    }

    public function plusQty(Request $request)
    {
        try {
            Cart::where('cart_id', $request->id)->where('user_id', Auth::user()->id)->first()->increment('qty');
            $item = Cart::where('cart_id', $request->id)->where('user_id', Auth::user()->id)->first();
        } catch (\Throwable $th) {
            return response()->json(['qty' => 0]);
        }
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $total_price = 0;
        
        foreach ($cart as $key => $item1) {
            $price = $item1->variant->sales_price;
            foreach ($item1->cartVariation as $key => $variation) {
                $price += ($price * $variation->variation->percentage)/100;
            }
            $total_price += $price * $item1->qty;
        }
        return response()->json(['qty' => $item->qty, 'total_price' => $total_price]);
    }

    public function minusQty(Request $request)
    {
        try {
            $item = Cart::where('cart_id', $request->id)->where('user_id', Auth::user()->id)->first();
            if ($item->qty > 1) {
                Cart::where('cart_id', $request->id)->where('user_id', Auth::user()->id)->first()->decrement('qty');
            }
        } catch (\Throwable $th) {
            return response()->json(['qty' => 0]);
        }
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $total_price = 0;
        
        foreach ($cart as $key => $item1) {
            $price = $item1->variant->sales_price;
            foreach ($item1->cartVariation as $key => $variation) {
                $price += ($price * $variation->variation->percentage)/100;
            }
            $total_price += $price * $item1->qty;
        }
        return response()->json(['qty' => $item->qty - 1, 'total_price' => $total_price]);
    }

    public function applyCoupon(Request $request)
    {
        $this->validate($request, [
            'couponCode' => 'required'
        ]);
        // Check Coupon Code
        $date = date('Y-m-d');
        $coupon = Coupon::where('name', $request->couponCode)->whereDate('start_date', '<=', $date)->whereDate('end_date', '>=', $date)->where('status', 'active')->first();
        // $usersCount = CouponUser::where('coupon_id', $coupon->coupon_id)->count();
        $usersCount = 1;
        if (!empty($coupon) && $usersCount <= $coupon->number_of_users) {
            session()->put('coupon', ['id' => $coupon->coupon_id, 'code' => $coupon->name, 'amount' => $coupon->value, 'type' => $coupon->type]);
            toast('Coupon applied', 'success');
        } else {
            toast('Invalid coupon code', 'error');
        }
        return back();
    }
}
