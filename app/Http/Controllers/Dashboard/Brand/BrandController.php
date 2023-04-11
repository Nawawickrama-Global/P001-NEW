<?php

namespace App\Http\Controllers\Dashboard\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::where('deleted_at', '=', null)->get();;
        return view('dashboard.brand.main', ['brands' => $brands]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required_if:brand_id,!=,null|image|mimes:jpeg,png,jpg',
            'brand_id' => 'nullable',
        ]);

        $image = [];
        if($request->hasFile('image')){
            $fileName = date('Y-m-d-H-i-s') . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $fileName, 'public');
            $image = ['brand_image' => $fileName];
        }

        try {
            if($request->brand_id != '') {
                Brand::find($request->brand_id)->update($image + $request->all());
                toast('Brand Updated', 'success');
            }else{
                Brand::create($image + $request->all());
                toast('Brand Created', 'success');
            }
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return back();
    }

    public function delete($id)
    {
        try {
            Brand::find($id)->delete();
            toast('Brand Deleted', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return back();
    }
}
