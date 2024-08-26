<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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
        // Lấy voucher của order
        $voucher = $order->voucher;
        $orderItems = $order->orderItems()->with('product.images')->get();
        return view('client.layouts.order-detail', compact('order', 'orderItems', 'voucher'));
    }

    public function cancel(Order $order)
    {
        $this->authorize('update', $order);
        DB::beginTransaction();
        try {
            foreach ($order->orderItems as $item) {
                $productVariant = ProductVariant::find($item->variant_id);

                if ($productVariant) {
                    $productVariant->quantity += $item->quantity;
                    $productVariant->save();
                } else {
                    Log::warning('Product variant not found for order item ID: ' . $item->id);
                }
            }
            $order->update(['status_id' => 8]);

            DB::commit();
            return redirect()->route('user.orders.history')->with('success', 'Đơn hàng đã được hủy.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user.orders.history')->with('error', 'Có lỗi xảy ra khi hủy đơn hàng, vui lòng thử lại.');
        }
    }

    public function showInvoice($id)
    {
        $order = Order::with('orderItems', 'status', 'voucher')->findOrFail($id);
        return response()->json($order);
    }
}
