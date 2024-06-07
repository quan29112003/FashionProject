<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Trả về danh sách tất cả categories dưới dạng JSON
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // Trả về thông tin chi tiết của một category dưới dạng JSON
    public function show(Category $category)
    {
        return response()->json($category);
    }

    // Xử lý yêu cầu tạo category mới và lưu vào cơ sở dữ liệu, trả về category mới tạo dưới dạng JSON
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu được gửi từ form
        $request->validate([
            'name' => 'required|unique:categories' // 'name' là trường bắt buộc và phải là duy nhất
        ]);

        // Tạo mới một category và lưu vào cơ sở dữ liệu
        $category = Category::create($request->all());

        // Trả về category mới tạo dưới dạng JSON
        return response()->json($category, 201);
    }

    // Xử lý yêu cầu cập nhật thông tin của category và trả về category đã được cập nhật dưới dạng JSON
    public function update(Request $request, Category $category)
    {
        // Kiểm tra dữ liệu được gửi từ form
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id // 'name' là trường bắt buộc và phải là duy nhất
        ]);

        // Cập nhật thông tin của category vào cơ sở dữ liệu
        $category->update($request->all());

        // Trả về category đã được cập nhật dưới dạng JSON
        return response()->json($category);
    }

    // Xóa một category khỏi cơ sở dữ liệu và trả về thông báo thành công dưới dạng JSON
    public function destroy(Category $category)
    {
        // Xóa category
        $category->delete();

        // Trả về thông báo thành công dưới dạng JSON
        return response()->json(['message' => 'Category deleted successfully']);
    }

}
