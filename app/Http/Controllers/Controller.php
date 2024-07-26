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

        $topOrders = DB::table('orders')
            ->join('statuses', 'orders.status_id', '=', 'statuses.id')
            ->join('payments', 'orders.payment_id', '=', 'payments.id')
            ->select('orders.id', 'orders.name', 'orders.total_amount', 'statuses.name as status_name', 'payments.name as payment_name')
            ->orderBy('orders.total_amount', 'desc')
            ->get();

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

        return view('admin.dashboard', ['data' => $data],compact('topOrders'));
    }
}
