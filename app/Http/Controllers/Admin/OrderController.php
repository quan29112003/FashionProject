<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Status;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Models\ProductVariant;
use App\Models\Product;



class OrderController extends Controller
{
    //
    public function index(){
        $orders = Order::with('status','payment')->get();
        $status = Status::all();
        $payment = Payment::all();
        return view('admin.orders.index',compact('orders','status','payment'));
    }

    public function show($id)
    {
        $order_items = OrderItem::where('order_id', $id)->get();

        return view('admin.orders.item', compact('order_items'));
    }

    public function update(Request $request,$id){
        $status = $request->status_id;
        $payment = $request->payment_id;
        $status ??= 4;
        $payment ??= 1;
        Order::where('id',$id)->update([
            'status_id' => $status,
            'payment_id' => $payment,
        ]);

        return response()->json(['success' => true]);
    }

    public function checkNewOrder(Request $request)
    {
        // Lấy các đơn hàng mới trong ngày hiện tại (ví dụ: những đơn hàng chưa được xử lý)
    $newOrders = Order::whereDay('created_at', date('d'))
    ->where('status_id', '=', 1)
    ->get(['id', 'total_amount']);

    // Kiểm tra xem có đơn hàng mới trong ngày hiện tại không
    $newOrderCount = Order::where('status_id', '=', 1)
        ->whereDay('created_at', date('d'))
        ->count();

    return response()->json([
        'newOrderCount' => $newOrderCount,
        'newOrders' => $newOrders
    ]);
    }


}
