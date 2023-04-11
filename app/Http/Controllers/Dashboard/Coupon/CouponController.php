<?php

namespace App\Http\Controllers\Dashboard\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::where('deleted_at', '=', null)->get();
        return view('dashboard.coupon.main', ['coupons' => $coupons]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'value' => 'required',
            'status' => 'required',
            'number_of_users' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'type' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        try {
            Coupon::create($request->all());
            toast('Coupon Created', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return back();
    }

    public function delete($id)
    {
        try {
            Coupon::find($id)->delete();
            toast('Coupon Deleted', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return back();
    }
}
