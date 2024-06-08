<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Lấy tất cả các categories từ cơ sở dữ liệu và truyền chúng vào view 'categories.index'
public function index()
{
    $categories = Category::all();
    return view('categories.index', compact('categories'));
}

// Trả về view 'categories.create' để hiển thị form tạo category mới
public function create()
{
    return view('categories.create');
}

// Xử lý yêu cầu tạo category mới từ form và lưu vào cơ sở dữ liệu
public function store(Request $request)
{
    // Kiểm tra dữ liệu được gửi từ form
    $request->validate([
        'name' => 'required|unique:categories' // 'name' là trường bắt buộc và phải là duy nhất
    ]);

    // Tạo mới một category và lưu vào cơ sở dữ liệu
    Category::create($request->all());

    // Chuyển hướng người dùng về lại trang danh sách categories với thông báo thành công
    return redirect()->route('categories.index')
                     ->with('success', 'Category created successfully');
}

// Trả về view 'categories.show' để hiển thị thông tin chi tiết của một category
public function show(Category $category)
{
    return view('categories.show', compact('category'));
}

// Trả về view 'categories.edit' để hiển thị form chỉnh sửa thông tin của một category
public function edit(Category $category)
{
    return view('categories.edit', compact('category'));
}

// Xử lý yêu cầu cập nhật thông tin của category từ form chỉnh sửa
public function update(Request $request, Category $category)
{
    // Kiểm tra dữ liệu được gửi từ form
    $request->validate([
        'name' => 'required|unique:categories,name,'.$category->id // 'name' là trường bắt buộc và phải là duy nhất
    ]);

    // Cập nhật thông tin của category vào cơ sở dữ liệu
    $category->update($request->all());

    // Chuyển hướng người dùng về lại trang danh sách categories với thông báo thành công
    return redirect()->route('categories.index')
                     ->with('success', 'Category updated successfully');
}

// Xóa một category khỏi cơ sở dữ liệu
public function destroy(Category $category)
{
    // Xóa category
    $category->delete();

    // Chuyển hướng người dùng về lại trang danh sách categories với thông báo thành công
    return redirect()->route('categories.index')
                     ->with('success', 'Category deleted successfully');
}

}
