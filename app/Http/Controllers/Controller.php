<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use Illuminate\Routing\Controller as BaseController;
use \stdClass;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function dashboard()
    {
        $dayAmount = DB::table('orders')
        ->whereDay('created_at', date('d'))
        ->where('status_id', '!=', 6)
        ->sum('total_amount');
        $dayOrder = DB::table('orders')->whereDay('created_at',date('d'))->count('id');
        $totalAmount = DB::table('orders')->where('status_id','!=',6)->sum('total_amount');
        $totalOrder = DB::table('orders')->count('id');
        $uniqueUserCount = DB::table('orders')->distinct('user_id')->count('user_id');
        $totalRefund = DB::table('orders')->where('status_id',6)->count('status_id');
        $totalAmounts = [];
        $totalRefunds = [];
        $totalOrders = [];

        $topProductIds = OrderItem::select('product_id')
        ->selectRaw('SUM(quantity) as total_quantity')
        ->groupBy('product_id')
        ->orderByDesc('total_quantity')
        ->limit(5)
        ->pluck('product_id');

        // Subquery để lấy một bản ghi duy nhất cho mỗi product_id và tổng quantity
        $subQuery = DB::table('order_items')
            ->select('id', 'product_id', 'name_product', 'thumbnail', 'quantity', 'size', 'color', 'color_code', 'price', 'created_at', 'updated_at')
            ->selectRaw('SUM(quantity) OVER (PARTITION BY product_id) as total_quantity')
            ->selectRaw('ROW_NUMBER() OVER (PARTITION BY product_id ORDER BY id) as row_number')
            ->whereIn('product_id', $topProductIds)
            ->orderBy('product_id');

        // Truy vấn chính sử dụng WHERE để lọc các hàng có row_number = 1
        $results = DB::table(DB::raw("({$subQuery->toSql()}) as sub"))
            ->mergeBindings($subQuery)
            ->where('sub.row_number', '=', 1)
            ->select('sub.*')
            ->get();

        //dd($results);

        $topOrders = DB::table('orders')
            ->join('statuses', 'orders.status_id', '=', 'statuses.id')
            ->join('payments', 'orders.payment_id', '=', 'payments.id')
            ->select('orders.id', 'orders.name', 'orders.total_amount', 'statuses.name as status_name', 'payments.name as payment_name')
            ->orderBy('orders.total_amount', 'desc')
            ->limit(5)
            ->get();




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
        $data->dayAmount = $dayAmount;
        $data->dayOrder = $dayOrder;
        $data->order = $totalAmount;

        $data->amount = $totalOrder;

        $data->customer = $uniqueUserCount;
        //chart đơn hàng
        $data->orders = $totalOrders;
        $data->earn = $totalAmount;
        //chart thu nhập
        $data->earns = $totalAmounts;
        $data->refund = $totalRefund;
        //chart hoàn trả
        $data->refunds = $totalRefunds;

        return view('admin.dashboard', ['data' => $data],compact('results','topOrders'));
    }
}
