<?php

namespace App\Http\Controllers\Site\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderVariation;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ShippingMethod;
use App\Models\Variation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('product_id')) {
            $this->validate($request, [
                'product_id' => 'required',
                'total_price' => 'required',
                'size' => 'required',
                'qty' => 'required'
            ]);
            session()->forget('coupon');
            $product_id = $request->product_id;
            $total_price = $request->total_price;
            $product = Product::find($product_id);
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
    
            $size = $request->size;
            $qty = $request->qty;
            $variant_id = $request->variation_id;
            session()->put('order', ['product_id' => $product_id, 'qty' => $qty, 'size' => $size, 'variant_id' => $variant_id, 'variations' => $variations, 'total_price' => $total_price]);
            session()->put('checkoutType', 'product');
        }else{
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            $total_price = 0;
            
            foreach ($cart as $key => $item) {
                $price = $item->variant->sales_price;
                foreach ($item->cartVariation as $key => $variation) {
                    $price += ($price * $variation->variation->percentage)/100;
                }
                $total_price += $price * $item->qty;
            }
            session()->put('checkoutType', $cart);
        }

        $shippingMethods = ShippingMethod::get();
        $parentCategories = Category::where('deleted_at', '=', null)->get();
        return view('site.cart.checkout', ['shippingMethods' => $shippingMethods, 'total_price' => $total_price, 'parentCategories' => $parentCategories]);
    }

    public function placeOrder(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'town' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'shipping_method_id' => 'required',
        ]);
        $order_id = null;
        try {
            $shippingCost = ShippingMethod::find($request->shipping_method_id)->price;
            if(session()->get('checkoutType') != 'product'){
                $carts = session()->get('checkoutType');
                $totalAmount = 0;
                DB::transaction(function () use($totalAmount, $shippingCost, $request, $carts, &$order_id) {
                    $order = Order::create(['user_id' => Auth::user()->id, 'total_amount' => 0] + $request->all());
                    $order_id = $order->order_id;
                    foreach ($carts as $key => $cart) {
                        $itemAmount = $cart->variant->sales_price;
                        $orderItem = OrderItem::create(['order_id' => $order->order_id, 'product_id' => $cart->product_id, 'variant_id' => $cart->variant_id, 'qty' => $cart->qty]);
                        foreach ($cart->cartVariation as $key => $variations) {
                            $variation = Variation::find($variations->variation_id);
                            OrderVariation::create(['order_item_id' => $orderItem->order_item_id, 'variation_id' => $variations->variation_id]);
                            $itemAmount += $itemAmount * $variation->percentage / 100;
                        }
                        $totalAmount += $itemAmount * $cart->qty;
                    }
                    if($shippingCost > 0){
                        $totalAmount =$totalAmount + $shippingCost;
                    }
                    $order->update(['total_amount' => $totalAmount]);
                    Cart::where('user_id', Auth::user()->id)->delete();
                    toast('Order placed', 'success');
                    
                });


            }else{
                $orderData = session()->get('order');
                $variations = $orderData['variations'];
                $size = ProductVariation::find($orderData['size']);
                
                $totalAmount = $size->sales_price;
    
                DB::transaction(function () use ($request, $totalAmount, $orderData, $variations, $shippingCost, &$order_id) {
                    $order = Order::create(['user_id' => Auth::user()->id, 'total_amount' => $totalAmount] + $request->all());
                    $order_id = $order->order_id;
                    $orderItem = OrderItem::create(['order_id' => $order->order_id, 'product_id' => $orderData['product_id'], 'variant_id' => $orderData['variant_id'], 'qty' => $orderData['qty']]);
                    foreach ($variations as $key => $value) {
                        $variation = Variation::find($value['variation_id']);
                        OrderVariation::create(['order_item_id' => $orderItem->order_item_id, 'variation_id' => $value['variation_id']]);
                        $totalAmount += $totalAmount * $variation->percentage / 100;
                    }
                    if($shippingCost > 0){
                        $totalAmount =$totalAmount + $shippingCost;
                    }
                    $order->update(['total_amount' => $totalAmount]);
                    Cart::where('user_id', Auth::user()->id)->delete();
                    toast('Order placed', 'success');
                    
                });
            }

        } catch (\Throwable $th) {
            toast($th->getMessage(), 'error');
        }
        return redirect()->route('order', $order_id);
    }
    public function viewOrder($id)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('order_id', $id)->first();
        $parentCategories = Category::where('deleted_at', '=', null)->get();
        return view('site.cart.order', ['order' => $order, 'parentCategories' => $parentCategories]);
    }
}
