<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use App\Models\Category;
use Illuminate\Http\Request;



class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::with('category')->get();
        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.vouchers.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:vouchers',
            'discount_type' => 'required|string',
            'discount_value' => 'required|numeric',
            'expiry_date' => 'required|date',
            'min_purchase_amount' => 'nullable|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'max_usage' => 'nullable|integer',
            'applicable_products' => 'nullable|string',
            'distribution_channels' => 'nullable|string',
        ]);

        Voucher::create($request->all());
        return redirect()->route('admin.vouchers.index');
    }

    public function edit($id)
    {
        $voucher = Voucher::find($id);
        $categories = Category::all();
        return view('admin.vouchers.edit', compact('voucher', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'string|max:255|unique:vouchers,code,' . $id,
            'discount_type' => 'string',
            'discount_value' => 'numeric',
            'expiry_date' => 'date',
            'min_purchase_amount' => 'nullable|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'max_usage' => 'nullable|integer',
            'used_count' => 'nullable|integer',
            'applicable_products' => 'nullable|string',
            'created_count' => 'nullable|integer',
            'remaining_count' => 'nullable|integer',
            'distribution_channels' => 'nullable|string',
        ]);

        $voucher = Voucher::find($id);
        $voucher->update($request->all());
        return redirect()->route('admin.vouchers.index');
    }

    public function destroy($id)
    {
        $voucher = Voucher::find($id);
        $voucher->delete();
        return redirect()->route('admin.vouchers.index');
    }

    public function getByCategory($categoryID)
    {
        $vouchers = Voucher::where('category_id', $categoryID)->get();
        return response()->json($vouchers);
    }
}








