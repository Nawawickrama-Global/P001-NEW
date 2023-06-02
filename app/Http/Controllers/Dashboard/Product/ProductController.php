<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = SubCategory::where('deleted_at', null)->get();
        $brands = Brand::where('deleted_at', null)->get();
        $attributes = Attribute::where('deleted_at', null)->where('attribute_id', '>', 2)->get();
        return view('dashboard.product.add', ['brands' => $brands, 'categories' => $categories, 'attributes' => $attributes]);
    }

    public function viewProduct()
    {
        $products = Product::where('deleted_at', null)->get();
        return view('dashboard.product.view', ['products' => $products]);
    }

    public function addNewProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'sku' => 'required|max:255',
            'sub_category_id' => 'required',
            'feature_img' => 'required|image|mimes:jpeg,png,jpg',
            'product_images.*' => 'nullable|image|mimes:jpeg,png,jpg',
            'short_description' => 'required',
            'long_description' => 'required',
            'sales_price1' => 'required|numeric',
            'stock1' => 'required|integer',
        ]);
        if ($validator->fails()) {
            $all_errors = null;

            foreach ($validator->errors()->messages() as $errors) {
                foreach ($errors as $error) {
                    $all_errors .= $error . "<br>";
                }
            }
            toast($all_errors, 'warning');
            return redirect()->back()->withErrors($validator)->withInput();;
        }

        $product_img = '';
        if($request->hasFile('feature_img')){
            $feature_img = date('Y-m-d-H-i-s') . $request->file('feature_img')->getClientOriginalName();
            $request->file('feature_img')->storeAs('images', $feature_img, 'public');
        }

        try {

            DB::transaction(function() use ($feature_img, $product_img, $request) {
                $product = Product::create(['feature_image' => $feature_img, 'product_image' => $product_img] + $request->all());

                $productImages = $request->file('product_images');
                foreach ($productImages as $key => $image) {
                    $imageName = date('Y-m-d-H-i-s') . $image->getClientOriginalName();
                    $image->storeAs('images', $imageName, 'public');
                    ProductImage::create(['image_path' => $imageName, 'product_id' =>  $product->product_id]);
                }

                for ($i=1; $i <= $request->item_count; $i++) { 
                    $size = 'size'.$i;
                    $size = $request->$size;
                    $sales_price = 'sales_price'.$i;
                    $sales_price = $request->$sales_price;
                    $stock = 'stock'.$i;
                    $stock = $request->$stock;

                    ProductVariation::create([
                        'product_id' => $product->product_id,
                        'size' => $size,
                        'sales_price' => $sales_price,
                        'stock' => $stock,
                    ]);
                }

                $attributes = Attribute::where('deleted_at', null)->get();
                foreach ($attributes as $key => $attribute) {
                    $attr = 'attr'.$attribute->attribute_id;
                    if($request->has($attr)){
                        ProductAttribute::create([
                            'product_id' => $product->product_id,
                            'attribute_id' => $attribute->attribute_id,
                        ]);
                    }
                }

                if($request->has('faux_and_synthetic')){
                    ProductAttribute::create([
                        'product_id' => $product->product_id,
                        'attribute_id' => 1,
                    ]);
                    ProductAttribute::create([
                        'product_id' => $product->product_id,
                        'attribute_id' => 2,
                    ]);
                }
            });

            toast('Product Added', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return redirect()->back();
    }
    public function updateProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'sku' => 'required|max:255',
            'sub_category_id' => 'required',
            'feature_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg',
            'short_description' => 'required',
            'long_description' => 'required',
            'sales_price1' => 'required|numeric',
            'stock1' => 'required|integer',
        ]);
        if ($validator->fails()) {
            $all_errors = null;

            foreach ($validator->errors()->messages() as $errors) {
                foreach ($errors as $error) {
                    $all_errors .= $error . "<br>";
                }
            }
            toast($all_errors, 'warning');
            return redirect()->back()->withErrors($validator)->withInput();;
        }
        $product = Product::find($request->id);

        $product_img = '';
        $feature_image = [];

        if($request->hasFile('feature_img')){
            $feature_img = date('Y-m-d-H-i-s') . $request->file('feature_img')->getClientOriginalName();
            $request->file('feature_img')->storeAs('images', $feature_img, 'public');
            $feature_image = ['feature_image' => $feature_img ];
        }

        if($request->hasFile('image1')){
            $image1 = date('Y-m-d-H-i-s') . $request->file('image1')->getClientOriginalName();
            $request->file('image1')->storeAs('images', $image1, 'public');
            $product_img .= ','.$image1;
        }
        if($request->hasFile('image2')){
            $image2 = date('Y-m-d-H-i-s') . $request->file('image2')->getClientOriginalName();
            $request->file('image2')->storeAs('images', $image2, 'public');
            $product_img .= ','.$image2;
        }
        if($request->hasFile('image3')){
            $image3 = date('Y-m-d-H-i-s') . $request->file('image3')->getClientOriginalName();
            $request->file('image3')->storeAs('images', $image3, 'public');
            $product_img .= ','.$image3;
        }
        if($request->hasFile('image4')){
            $image4 = date('Y-m-d-H-i-s') . $request->file('image4')->getClientOriginalName();
            $request->file('image4')->storeAs('images', $image4, 'public');
            $product_img .= ','.$image4;
        }
        if($request->hasFile('image5')){
            $image5 = date('Y-m-d-H-i-s') . $request->file('image5')->getClientOriginalName();
            $request->file('image5')->storeAs('images', $image5, 'public');
            $product_img .= ','.$image5;
        }

        try {

            DB::transaction(function() use ($request, $feature_image  , $product) {

                $product->update($feature_image + $request->all());
                ProductAttribute::where('product_id', $product->product_id)->delete();
                ProductVariation::where('product_id', $product->product_id)->delete();

                for ($i=1; $i <= $request->item_count; $i++) { 
                    $size = 'size'.$i;
                    $size = $request->$size;
                    $sales_price = 'sales_price'.$i;
                    $sales_price = $request->$sales_price;
                    $stock = 'stock'.$i;
                    $stock = $request->$stock;

                    ProductVariation::create([
                        'product_id' => $product->product_id,
                        'size' => $size,
                        'sales_price' => $sales_price,
                        'stock' => $stock,
                    ]);
                }

                $attributes = Attribute::where('deleted_at', null)->get();
                foreach ($attributes as $key => $attribute) {
                    $attr = 'attr'.$attribute->attribute_id;
                    if($request->has($attr)){
                        ProductAttribute::create([
                            'product_id' => $product->product_id,
                            'attribute_id' => $attribute->attribute_id,
                        ]);
                    }
                }

                if($request->has('faux_and_synthetic')){
                    ProductAttribute::create([
                        'product_id' => $product->product_id,
                        'attribute_id' => 1,
                    ]);
                    ProductAttribute::create([
                        'product_id' => $product->product_id,
                        'attribute_id' => 2,
                    ]);
                }
            });

            toast('Product Updated', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return redirect()->back();
    }

    

    public function editProduct($id)
    {
        $product = Product::find($id);
        $categories = SubCategory::where('deleted_at', null)->get();
        $brands = Brand::where('deleted_at', null)->get();
        $attributes = Attribute::where('deleted_at', null)->where('attribute_id', '>', 2)->get();
        return view('dashboard.product.edit', ['brands' => $brands, 'categories' => $categories, 'attributes' => $attributes, 'product' => $product]);
    }

    public function deleteProduct($id)
    {
        try {
            Product::find($id)->delete();
            toast('Product Deleted', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return back();
    }
}
