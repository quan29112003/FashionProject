<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;



class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::with('category', 'products')->get();
        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.vouchers.create', compact('categories', 'products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:vouchers',
            'discount_type' => 'required|string|in:discount,discount%',
            'discount_value' => ['required', 'numeric', function ($attribute, $value, $fail) use ($request) {
                $discountType = $request->input('discount_type');

                if ($discountType === 'discount' && ($value < 0 || $value > 999999)) {
                    $fail('Giá trị giảm giá tiền phải nằm trong khoảng từ 0 đến 999999.');
                } elseif ($discountType === 'discount%' && ($value < 0 || $value > 100)) {
                    $fail('Giá trị giảm theo % phải nằm trong khoảng từ 0 đến 100.');
                }
            }],
            'expiry_date' => 'required|date',
            'min_purchase_amount' => 'nullable|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'max_usage' => 'nullable|integer',
            'applicable_products' => 'required|array',
            'applicable_products.*' => 'exists:products,id',
            'distribution_channels' => 'nullable|string',
        ]);

        $voucher = Voucher::create($request->all());
        $voucher->products()->sync($request->applicable_products);
        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher created successfully.');
    }

    public function edit($id)
    {
        $voucher = Voucher::with('products')->findOrFail($id);
        $categories = Category::all();
        $products = Product::all();

        return view('admin.vouchers.edit', compact('voucher', 'categories', 'products'));
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
            'applicable_products' => 'required|array',
            'applicable_products.*' => 'exists:products,id',
            'created_count' => 'nullable|integer',
            'remaining_count' => 'nullable|integer',
            'distribution_channels' => 'nullable|string',
        ]);

        $voucher = Voucher::findOrFail($id);
        $voucher->update($request->all());
        $voucher->products()->sync($request->applicable_products);
        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher updated successfully.');
    }

    public function destroy($id)
    {
        $voucher = Voucher::find($id);
        $voucher->delete();
        return redirect()->route('admin.vouchers.index');
    }
    public function getProductsByCategory($categoryId)
    {
        $products = Product::where('category_id', $categoryId)->get();
        return response()->json($products);
    }
}
