<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;


class ImageController extends Controller
{
    //
    public function index($id)
    {
        $images = ProductImage::where('product_id',$id)->get();
        return view('admin.gallery.index',compact('images'));
    }

    public function edit($id){
        $image = ProductImage::where('id',$id)->first();
        return view('admin.gallery.edit',compact('image'));
    }

    public function handleEdit(Request $request, $id){
        $data = $request->except('_token', '_method');
        $currentImageUrl = $data['url']; // Lưu trữ đường dẫn ảnh hiện tại

        if ($request->hasFile('url')) {
            // Lấy tên ảnh mới
            $imageName = time() . '_' . $currentImageUrl->getClientOriginalName();

            // Xóa ảnh cũ
            if (file_exists(public_path($currentImageUrl))) {
                unlink(public_path($currentImageUrl));
            }

            // Lưu ảnh mới
            $currentImageUrl->move(public_path('uploads'), $imageName);

            ProductImage::where('id',$id)->update([
                'url' => $imageName
            ]);
        }
        return back();
    }
}
