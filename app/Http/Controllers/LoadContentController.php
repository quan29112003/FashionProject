<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoadContentController extends Controller
{
    public function loadContent() {
        // Lấy dữ liệu cần thiết từ database hoặc các nguồn khác
        // $data = YourModel::all();
        return view('your-content-view');
    }
}
