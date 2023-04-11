<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerRegistrationController extends Controller
{
    public function index()
    {
        $parentCategories = Category::where('deleted_at', '=', null)->get();
        return view('site.auth.registration', ['parentCategories' => $parentCategories]);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact_number' => 'required|numeric',
            'profession' => 'required|string|max:255',
            'password' => 'required|min:8|string|same:confirmed',
        ]);
        
        try {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'contact_number' => $request->contact_number,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
    
                Customer::create(['user_id' => $user->id] + $request->all());
    
                toast('Please login', 'success');
            });

        } catch (\Throwable $th) {
            toast($th->getMessage(), 'warning');
        }

        return redirect()->route('customer-login');
    }

    public function login()
    {
        $parentCategories = Category::where('deleted_at', '=', null)->get();
        return view('site.auth.login', ['parentCategories' => $parentCategories]);
    }
}
