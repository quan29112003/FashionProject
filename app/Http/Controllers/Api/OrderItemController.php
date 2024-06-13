<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index(Request $request)
    {
        $orderID = $request->query('order_id');

        if (!$orderID) {
            return response()->json([
                'error' => 'order_id is required'
            ]);
        }

        $orderItems = OrderItem::where('orderID', $orderID)->get();

        return response()->json($orderItems);
    }
}
