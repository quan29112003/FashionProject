<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();

        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled', // Đảm bảo status chỉ nhận các giá trị được phép
        ]);

        // Tìm đơn hàng theo ID
        $order = Order::findOrFail($id);

        // Cập nhật trạng thái của đơn hàng
        $order->status = $request->status;
        $order->save();

        // Trả về thông báo thành công
        return response()->json(['message' => 'Order status updated successfully'], 200);
    }
}