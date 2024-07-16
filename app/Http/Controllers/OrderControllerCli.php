<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderControllerCli extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('client.layouts.order-history', compact('orders'));
    }
}
