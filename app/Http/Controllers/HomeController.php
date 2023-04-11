<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $parentCategories;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->parentCategories = Category::where('deleted_at', '=', null)->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('deleted_at', '=', null)->orderBy('product_id', 'DESC')->paginate(20);
        $categories = Category::where('deleted_at', '=', null)->get();
        $brands = Brand::where('deleted_at', '=', null)->get();
        return view('site.home.home', ['products' => $products, 'categories' => $categories, 'brands' => $brands, 'parentCategories' => $this->parentCategories]);
    }

    public function aboutUs()
    {
        return view('site.contact.about',['parentCategories' => $this->parentCategories]);
    }

    public function whyUs()
    {
        $products = Product::where('deleted_at', '=', null)->orderBy('product_id', 'DESC')->paginate(20);
        return view('site.why-us.main',['parentCategories' => $this->parentCategories, 'products' => $products]);
    }

    public function partners()
    {
        return view('site.partner.main',['parentCategories' => $this->parentCategories]);
    }

    public function contact()
    {
        return view('site.contact.main',['parentCategories' => $this->parentCategories]);
    }

    public function privacy()
    {
        return view('site.other.privacy-policy',['parentCategories' => $this->parentCategories]);
    }

    public function terms()
    {
        return view('site.other.terms-and-condition',['parentCategories' => $this->parentCategories]);
    }
}
