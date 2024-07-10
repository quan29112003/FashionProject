<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use \stdClass;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function dasboard()
    {
        $dayAmount = DB::table('orders')->whereDay('created_at',date('d'))->sum('total_amount');
        $dayOrder = DB::table('orders')->whereDay('created_at',date('d'))->count('id');
        $totalAmount = DB::table('orders')->sum('total_amount');
        $totalOrder = DB::table('orders')->count('id');
        $uniqueUserCount = DB::table('orders')->distinct('user_id')->count('user_id');
        $totalRefund = DB::table('orders')->where('payment_id',7)->count('payment_id');
        $totalAmounts = [];
        $totalRefunds = [];
        $totalOrders = [];

        // Đầu tiên, lấy top 5 sản phẩm theo tổng số lượng từ bảng order_items
        $topProducts = DB::table('order_items')
        ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy('product_id')
        ->orderBy('total_quantity', 'DESC')
        ->limit(5)
        ->pluck('product_id');

        // Sau đó, join với bảng products và product_variants để lấy các trường cần thiết
        $results = DB::table('products')
        ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
        ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
        ->whereIn('products.id', $topProducts)
        ->groupBy('products.id', 'products.name_product', 'product_variants.quantity', 'product_variants.price_sale')
        ->select('products.name_product', 'product_variants.quantity', 'product_variants.price_sale', DB::raw('SUM(order_items.quantity) as total_quantity'))
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
                ->where('payment_id', 7)
                ->count('payment_id');
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
        $data->earn = 102;
        //chart thu nhập
        $data->earns = $totalAmounts;
        $data->refund = $totalRefund;
        //chart hoàn trả
        $data->refunds = $totalRefunds;

        //chart lượt view
        $data->views = [20,40,40];

        // dd($entries);
        return view('admin.dashboard', ['data' => $data],compact('results'));
    }
}
