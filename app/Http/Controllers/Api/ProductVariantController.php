<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariant;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$productID)
    {
        if (!$productID) {
            return response()->json([
                'error' => 'productID is required'
            ], 400);
        }

        $productVariants = ProductVariant::where('product_id', $productID)
            ->with('color', 'size')
            ->get();

        return response()->json($productVariants);
    }

    public function getAllVariant()
    {
        return ProductVariant::all();
        // ->orderBy('created_at', 'desc')
        // ->get();
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $product_id)
    {
        // Xác thực dữ liệu request
        // $validatedData = $request->validate([
        //     'colorID' => 'required|exists:product_colors,id',
        //     'sizeID' => 'required|exists:product_sizes,id',
        //     'quantity' => 'required|integer',
        //     'price' => 'required|numeric',
        //     'type' => 'required|string|max:255',
        // ]);

        // // Tạo mới ProductVariant và gán productID từ đường dẫn
        // $productVariant = new ProductVariant([
        //     'productID' => $productID,
        //     'colorID' => $validatedData['colorID'],
        //     'sizeID' => $validatedData['sizeID'],
        //     'quantity' => $validatedData['quantity'],
        //     'price' => $validatedData['price'],
        //     'type' => $validatedData['type'],
        // ]);

        // // Lưu bản ghi vào cơ sở dữ liệu
        // $productVariant->save();

        // // Trả về JSON response
        // return response()->json($productVariant, 201);

        $data = $request->all();

        // $validatedData = $request->validate([
        //     'colorID' => 'required|exists:product_colors,id',
        //     'sizeID' => 'required|exists:product_sizes,id',
        //     'quantity' => 'required|integer',
        //     'price' => 'required|numeric',
        //     'type' => 'required|string|max:255'
        // ]);
        // foreach($data as $item){

        ProductVariant::create($data);


        return response()->json(['message' => 'Product variant created'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($product, $variant)
    {
        // Lấy ProductVariant theo productID và variantID
        $productVariant = ProductVariant::where('product_id', $product)
            ->findOrFail($variant);
        return response()->json($productVariant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product,$variant)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'color_id' => 'required|exists:product_colors,id',
            'size_id' => 'required|exists:product_sizes,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'price_sale' => 'required|numeric',
            'SKU' => 'required|string|max:255',
            'is_active' => 'required|string|max:255',
            'type' => 'required|string|max:255'
        ]);

        // Find the product variant and update its information
        $productVariant = ProductVariant::find($variant);

        if ($productVariant && $productVariant->product_id == $product) {
            $productVariant->update($validatedData);
        } else {
            return response()->json(['message' => 'Product variant not found or does not belong to this product'], 404);
        }

        return response()->json(['message' => 'Product variants updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductVariant $productVariant)
    {
        $productVariant->delete();

        return response()->noContent();
    }
}
