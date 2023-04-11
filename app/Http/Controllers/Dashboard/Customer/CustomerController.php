<?php

namespace App\Http\Controllers\Dashboard\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('deleted_at', '=', null)->get();
        return view('dashboard.customer.view', ['customers' => $customers]);
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('dashboard.customer.edit', ['customer' => $customer]);
    }
    public function delete($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $customer = Customer::find($id);
                User::find($customer->user_id)->update(['status' => 'inactive']);
                $customer->delete();
            });
            toast('Customer Deleted', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        try {
            DB::transaction(function () use ($request, $id) {
                $customer = Customer::find($id);
                User::find($customer->user_id)->update($request->all());
                $customer->update($request->all());
            });
            toast('Customer Updated', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }
        return redirect()->back();
    }
}
