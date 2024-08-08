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
use \stdClass;



class OrderController extends Controller
{
    //
    public function index(){
        $orders = Order::with('status','payment')->orderBy('updated_at', 'desc')->get();
        $status = Status::all();
        $payment = Payment::all();
        return view('admin.orders.index',compact('orders','status','payment'));
    }

    public function show($id)
    {
        $order_items = OrderItem::where('order_id', $id)->get();

        return view('admin.orders.item', compact('order_items'));
    }

    public function update(Request $request, $id)
{
    $order = Order::find($id);

    // Cập nhật trạng thái
    $order->status_id = $request->input('status_id');

    // Cập nhật payment nếu giá trị mới không phải là giá trị cuối cùng
    if ($request->has('payment_id')) {
        $newPaymentId = $request->input('payment_id');
        if ($order->payment_id != 2 || $newPaymentId != 2) {
            $order->payment_id = $newPaymentId;
        }
    }

    $order->save();

    return response()->json(['success' => true]);
}

    public function checkNewOrder(Request $request)
    {
        // Lấy các đơn hàng mới trong ngày hiện tại (ví dụ: những đơn hàng chưa được xử lý)
        $newOrders = Order::where('status_id', '=', 1)
        ->orderBy('created_at', 'desc') // Sắp xếp theo created_at giảm dần
        ->get(['id', 'total_amount', 'created_at']);

        // Kiểm tra xem có đơn hàng mới trong ngày hiện tại không
        $newOrderCount = Order::where('status_id', '=', 1)
            ->count();

        return response()->json([
            'newOrderCount' => $newOrderCount,
            'newOrders' => $newOrders
        ]);
    }

    public function singleDateStatistics(Request $request)
    {
        $date = $request->input('date');

        $totalAmount = Order::whereDate('created_at', $date)->sum('total_amount');

        return response()->json(['totalAmount' => $totalAmount]);
    }

    public function dateRangeStatistics(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $totalAmount = Order::whereBetween('created_at', [$start_date, $end_date])->sum('total_amount');

        return response()->json(['totalAmount' => $totalAmount]);
    }

    public function statistics(Request $request)
    {
        $date = $request->input('date');

        // Tính tổng số order trong ngày đã chọn
        $totalOrders = Order::whereDate('created_at', $date)->count();

        return response()->json([
            'totalOrders' => $totalOrders
        ]);
    }

    public function customerStatistics(Request $request)
    {
        $date = $request->input('date');

        $totalCustomers = Order::whereDate('created_at', $date)->distinct('user_id')->count('user_id');

        return response()->json([
            'totalCustomers' => $totalCustomers
        ]);
    }

    public function filterOrders(Request $request)
    {
        $status_id = $request->input('status_id');
        $payment_id = $request->input('payment_id');

        $orders = Order::when($status_id, function ($query, $status_id) {
            return $query->where('status_id', $status_id);
        })
        ->when($payment_id, function ($query, $payment_id) {
            return $query->where('payment_id', $payment_id);
        })
        ->select('total_amount', 'name', 'address', 'phone', 'email')
        ->get();

        return response()->json($orders);
    }


    public function chart(){
        $totalRefund = DB::table('orders')->where('status_id',6)->count('status_id');
        $totalAmount = DB::table('orders')->where('status_id','!=',6)->sum('total_amount');
        $totalOrder = DB::table('orders')->count('id');
        $totalAmounts = [];
        $totalRefunds = [];
        $totalOrders = [];

        // Vòng lặp qua từng tháng
        for ($month = 1; $month <= 12; $month++) {
            $monthAmount = DB::table('orders')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', date('Y')) // Lọc theo năm hiện tại
                ->sum('total_amount');
            $totalAmounts[$month] = $monthAmount;
        }

        for ($month = 1; $month <= 12; $month++) {
            $refund = DB::table('orders')
                ->whereMonth('created_at', $month)
                ->where('status_id', 6)
                ->count('status_id');
            $totalRefunds[$month] = $refund;
        }

        for ($month = 1; $month <= 12; $month++) {
            $orders = DB::table('orders')
                ->whereMonth('created_at', $month)
                ->count('id');
            $totalOrders[$month] = $orders;
        }

        $data = new stdClass();
        $data->amount = $totalOrder;
        //chart đơn hàng
        $data->orders = $totalOrders;
        $data->earn = $totalAmount;
        //chart thu nhập
        $data->earns = $totalAmounts;
        $data->refund = $totalRefund;
        //chart hoàn trả
        $data->refunds = $totalRefunds;

        return view('admin.statistical', ['data'=>$data]);

    }


}
