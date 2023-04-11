<?php

namespace App\Http\Controllers\Dashboard\Attribute;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Variation;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::where('deleted_at', null)->get();
        return view('dashboard.attribute.main', ['attributes' => $attributes]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        try {
            if($request->id != null){
                Attribute::find($request->id)->update($request->all());
                toast('Attribute Updated', 'success');
            }else{
                Attribute::create($request->all());
                toast('Attribute Added', 'success');
            }
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return redirect()->back();
    }

    public function variations($id)
    {
        $attributeName = Attribute::findOrFail($id)->name;
        $variations = Variation::where('deleted_at', null)->where('attribute_id', $id)->get();
        return view('dashboard.variations.main', ['attribute_id' => $id, 'attributeName' => $attributeName, 'variations' => $variations]);
    }

    public function createVariation(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'percentage' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        if($request->hasFile('file')){
            $fileName = date('Y-m-d-H-i-s') . $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('images', $fileName, 'public');
        }

        try {
            if($request->id != null){
                Variation::find($request->id)->update(['image' => $fileName] + $request->all());
                toast('Variation Updated', 'success');
            }else{
                Variation::create(['image' => $fileName] + $request->all());
                toast('Variation Added', 'success');
            }
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            Attribute::find($id)->delete();
            toast('Attribute Deleted', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }
        return redirect()->back();
    }

    public function deleteVariation($id)
    {
        try {
            Variation::find($id)->delete();
            toast('Variation Deleted', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }
        return redirect()->back();
    }
    
}
