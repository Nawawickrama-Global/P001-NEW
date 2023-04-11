<?php

namespace App\Http\Controllers\Dashboard\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('dashboard.order.view', ['orders' => $orders]);
    }

    public function getOrder($id)
    {
        $items = OrderItem::where('order_id', $id)->get();
        $subTotal = 0;
        $table = '';
        foreach ($items as $key => $item) {
            $price = $item->variant->sales_price;
            $variations = '';
            foreach ($item->orderVariation as $variation) {
                $variations .= '<span class="badge badge-danger mb-1">';
                $variations .= $variation->variation->attribute->name.' >> '.$variation->variation->name;
                $variations .= '</span><br>';
                $price += ($price * $variation->variation->percentage)/100;
            }

            $table .= '<tr>';
            $table .= '<td>' . ($key + 1) . '</td>';
            $table .= '<td>' . $item->product->title . '</td>';
            $table .= '<td>' . $item->product->sku . '</td>';
            $table .= '<td>' . $item->product->brand->name . '</td>';
            $table .= '<td>'. $variations .'</td>';
            $table .= '<td>' . $item->qty. '</td>';
            $table .= '<td>' . $item->variant->size . '</td>';
            $table .= '<td>' .config('app.currency_code') . $price . '</td>';
            $table .= '</tr>';

            $subTotal += $price;
        }
        $table .= '<tr><th colspan="7">Sub Total</th><td>'.config('app.currency_code'). $subTotal .'</td></tr>';

        return response()->json(['table' => $table]);
    }
}
