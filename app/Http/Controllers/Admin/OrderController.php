<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Models\ProductVariant;
use App\Models\Product;



class OrderController extends Controller
{
    //
    public function index(){
        $orders = Order::all();
        return view('admin.orders.index',compact('orders'));
    }

    public function show($id)
    {
        $order_items = OrderItem::where('order_id', $id)->get();

        $products = [];
        $productVariants = [];

        foreach ($order_items as $o) {
            $product = Product::where('id', $o->product_id)->select('name_product')->first();
            $products[$o->id] = $product;

            $productVariant = ProductVariant::with(['color', 'size'])->where('id', $o->variant_id)->first();
            $productVariants[$o->id] = $productVariant;
        }

        return view('admin.orders.item', compact('order_items', 'products', 'productVariants'));
    }

    public function update(Request $request,$id){
        $status = $request->status;
        $payment = $request->payment;
        Order::where('id',$id)->update([
            'status' => $status,
            'payment' => $payment,
        ]);

        return response()->json(['success' => true]);
    }


}
