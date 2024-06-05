<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    // Hiển thị danh sách khuyến mãi
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index', compact('promotions'));
    }

    // Hiển thị form tạo khuyến mãi mới
    public function create()
    {
        return view('promotions.create');
    }

    // Lưu khuyến mãi mới
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:promotions|max:255',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Promotion::create($request->all());
        return redirect()->route('promotions.index')->with('success', 'Khuyến mãi đã được tạo thành công.');
    }

    // Hiển thị form chỉnh sửa khuyến mãi
    public function edit(Promotion $promotion)
    {
        return view('promotions.edit', compact('promotion'));
    }

    // Cập nhật khuyến mãi
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'code' => 'required|max:255|unique:promotions,code,' . $promotion->id,
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $promotion->update($request->all());
        return redirect()->route('promotions.index')->with('success', 'Khuyến mãi đã được cập nhật thành công.');
    }

    // Xóa khuyến mãi
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotions.index')->with('success', 'Khuyến mãi đã được xóa thành công.');
    }
}
