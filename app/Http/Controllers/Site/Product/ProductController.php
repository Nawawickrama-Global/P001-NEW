<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Product;
use App\Models\RecentlyViewed;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('deleted_at', '=', null)->where('status', 'active');
        if($request->has('category')){
            $category_id = SubCategory::where('name', '=', $request->category)->first()->sub_category_id;
            $products = $products->where('sub_category_id', '=', $category_id );
        }
        if($request->has('parent_category')){
            $subcategory = Category::where('name', $request->parent_category)->first()->subcategory->toArray();
            $subcategoryIds = array_column($subcategory, 'sub_category_id');
            $products = $products->whereIn('sub_category_id', $subcategoryIds );
        }

        if($request->has('search')){
            $products = $products->where('title', 'like', "%{$request->get('search')}%");
        }
    
        $products = $products->paginate(20);
        $parentCategories = Category::where('deleted_at', '=', null)->get();
        return view('site.cart.product-list', ['products' => $products, 'parentCategories' => $parentCategories]);
    }

    public function shopByBrands(Request $request)
    {
        $products = Product::where('deleted_at', '=', null);
        if($request->has('brand')){
            $brand_id = Brand::where('name', '=', $request->brand)->first()->brand_id;
            $products = $products->where('brand_id', '=', $brand_id );
        }
        if($request->has('search')){
            $products = $products->where('title', 'like', "%{$request->get('search')}%");
        }

        $products = $products->paginate(20);
        $parentCategories = Category::where('deleted_at', '=', null)->get();
        $brands = Brand::where('deleted_at', '=', null)->get();
        return view('site.cart.product-brand', ['products' => $products, 'brands' => $brands, 'parentCategories' => $parentCategories]);
    }

    public function viewProduct($id)
    {
        $Product = Product::where('deleted_at', '=', null)->where('product_id', $id)->first();
        $suggestions = Product::where('deleted_at', '=', null)->where('sub_category_id', $Product->sub_category_id)->get();
        $parentCategories = Category::where('deleted_at', '=', null)->get();
        $recentlyViewed = RecentlyViewed::limit(10)->orderBy('recently_viewed_id', 'DESC')->get();
        if(Auth::check()){
            $old = RecentlyViewed::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
            if(!empty($old)){
                $old->delete();
            }
            RecentlyViewed::create(['user_id' => Auth::user()->id, 'product_id' => $id]);
            $recentlyViewed = RecentlyViewed::where('user_id', Auth::user()->id)->limit(10)->orderBy('recently_viewed_id', 'DESC')->get();
        }
        
        return view('site.cart.single-product', ['product' => $Product, 'suggestions' => $suggestions, 'parentCategories' => $parentCategories, 'recentlyViewed' => $recentlyViewed]);
    }

    public function inquiry(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        try {
            $user_id = 0;
            if(Auth::check()){
                $user_id = Auth::user()->id;
            }
            Inquiry::create(['user_id' => $user_id] + $request->all());
            toast("Inquiry created successfully");
        } catch (\Throwable $th) {
            toast($th->getMessage(), "error");
        }
        return back();
    }

    public function viewInquiry()
    {
        $inquiries = Inquiry::where('deleted_at', null)->get();
        return view('dashboard.inquiry.main', ['inquiries' => $inquiries]);
    }
}
