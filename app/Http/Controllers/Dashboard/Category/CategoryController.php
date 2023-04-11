<?php

namespace App\Http\Controllers\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('deleted_at', '=', null)->get();
        $subCategories = SubCategory::where('deleted_at', '=', null)->get();
        $all = collect($categories)->merge(collect($subCategories));
        return view('dashboard.category.main', ['categories' => $categories, 'allCategories' => $all]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'image' => 'required_if:edit_category_id,!=,null|image|mimes:jpeg,png,jpg',
        ]);

        $image = [];
        if($request->hasFile('image')){
            $fileName = date('Y-m-d-H-i-s') . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $fileName, 'public');
            $image = ['category_image' => $fileName];
        }

        try {
            if($request->edit_category_id != '') {
                if($request->type == 'sub'){
                    SubCategory::find($request->edit_category_id)->update($image + $request->all());
                    toast('Sub Category Updated', 'success');
                }else{
                    Category::find($request->edit_category_id)->update($image + $request->all());
                    toast('Sub Category Updated', 'success');
                }
 
            }else{
                if($request->category_id == 'none'){
                    Category::create($image + $request->all());
                    toast('Category Created', 'success');
                }else{
                    SubCategory::create($image + $request->all());
                    toast('Sub Category Created', 'success');
                }

            }
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return back();
    }

    public function delete($cat,$id)
    {
        try {
            if($cat == 'sub'){
                SubCategory::find($id)->delete();
                toast('Sub Category Deleted', 'success');
            }else{
                Category::find($id)->delete();
                toast('Category Deleted', 'success');
            }
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return back();
    }
}
