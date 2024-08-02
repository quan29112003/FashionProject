<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderControllerCli extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('status', 'payment')
        ->orderBy('created_at', 'desc')->get();
        return view('client.layouts.order-history', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        $orderItems = $order->orderItems()->with('product')->get();

        return view('client.layouts.order-detail', compact('order', 'orderItems'));
    }
}
