<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function index(){
        $product = Product::with('categories')->get();
        return response()->json($product,200);
    }

    public function show($id){
        $product = Product::with('categories')->find($id);
        if(!$product){
            return response()->json([
                'message' => 'Product not found'
            ],404);
        }

        return response()->json($product);
    }

    public function store(Request $request){
        try{
            $category = Category::select('id','name')->get();
            response()->json($category);

            Product::create([
                'categoryID' => $request->categoryID,
                'nameProduct' => $request->nameProduct,
                'description' => $request->description,
                'price' => $request->price,
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'message' => "Something wrong"
            ]);
        }
    }

    public function update(Request $request,$id){
        try{
            $product = Product::with('categories')->find($id);

            // Kiểm tra nếu sản phẩm không tồn tại
            if (!$product) {
                return response()->json([
                    'message' => 'Product not found'
                ], 404);
            }

            $product->categoryID = $request->categoryID;
            $product->nameProduct = $request->nameProduct;
            $product->description = $request->description;
            $product->price = $request->price;
        }catch(\Exception $e){
            return response()->json([
                'message' => "Something Wrong"
            ],500);
        }
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null,204);
    }
}
