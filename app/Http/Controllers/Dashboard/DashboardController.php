<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalAmount = Order::sum('total_amount');
        $newOrders = Order::where('status', 'paid')->count();
        $newOrderAmount = Order::where('status', 'paid')->sum('total_amount');
        $todaySales = Order::where('status', 'paid')->whereDate('created_at', '=',  date('Y-m-d'))->count();
        $todaySalesAmount = Order::where('status', 'paid')->whereDate('created_at', '=',  date('Y-m-d'))->sum('total_amount');

        return view('dashboard.main', ['totalOrders' => $totalOrders, 'newOrders' => $newOrders, 'todaySales' => $todaySales, 'totalAmount' => $totalAmount, 'newOrderAmount' => $newOrderAmount, 'todaySalesAmount' => $todaySalesAmount]);
    }
}
