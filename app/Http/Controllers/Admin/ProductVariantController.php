<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductVariantController extends Controller
{
    //
    public function show($id){
        $productVariant = ProductVariant::with(['color', 'size'])->where('product_id',$id)->get();
        return view('admin.products.variant',compact('productVariant'));
    }

    public function edit($id){
        $productColor = ProductColor::all();
        $productSize = ProductSize::all();
        $productVariant = ProductVariant::with(['color', 'size'])->where('id',$id)->get();

        // dd($productVariant);
        return view('admin.products.editVariant',compact('productVariant','productSize','productColor'));
    }

    public function handleEdit(Request $request, $id){
        $data = $request->except('_token','_method');
        ProductVariant::where('id',$id)->update($data);
        return redirect()->route('product');

    }

    public function getSize(Request $request)
    {
        $productId = $request->get('product_id');
        $colorId = $request->get('color_id') ?? null;
        $productVariant = ProductVariant::with("size")->where('product_id', $productId)->where("quantity", ">", 0)->where('color_id', $colorId)->get();
        return response()->json(["size" => $productVariant->pluck("size","id")->unique()]);


    }
}
