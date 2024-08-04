<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderControllerCli extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('status', 'payment', 'orderItems.product.images')->orderBy('created_at', 'desc')->get();
        return view('client.layouts.order-history', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        $orderItems = $order->orderItems()->with('product.images')->get();
        return view('client.layouts.order-detail', compact('order', 'orderItems'));
    }
    public function cancel(Order $order)
    {
        $this->authorize('update', $order);

        $order->update(['status_id' => 8]);

        return redirect()->route('user.orders.history')->with('success', 'Đơn hàng đã được hủy.');
    }
}
