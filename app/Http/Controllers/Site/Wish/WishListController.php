<?php

namespace App\Http\Controllers\Site\Wish;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function addWishList(Request $request)
    {
        $wish = WishList::where('product_id', $request->id)->where('user_id', Auth::user()->id);
        if($wish->count() == 0){
            WishList::create(['user_id' => Auth::user()->id, 'product_id' => $request->id]);
            return response()->json(['wishlist' => true]);
        }else{
            $wish->first()->delete();
            return response()->json(['wishlist' => false]);
        }
    }

    public function wishList()
    {
        $wishes = WishList::where('user_id', Auth::user()->id)->get();
        $parentCategories = Category::where('deleted_at', '=', null)->get();
        $suggestions = Product::where('deleted_at', '=', null)->where('status', 'active')->limit(20)->get();
        return view('site.cart.wishlist', ['wishes' => $wishes, 'parentCategories' => $parentCategories, 'suggestions' => $suggestions]);
    }
}
