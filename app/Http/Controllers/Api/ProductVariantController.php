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
    public function index(Request $request)
    {
        // Lấy productID từ request
        $productID = $request->query('product_id');

        // Kiểm tra xem productID có tồn tại trong request không
        if (!$productID) {
            return response()->json([
                'error' => 'productID is required'
            ], 400);
        }

        // Lấy danh sách ProductVariant theo productID
        $productVariants = ProductVariant::where('product_id', $productID)
            ->with('color', 'size')
            ->get();

        return response()->json($productVariants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $productID)
    {

        $data = $request->all();

        $data = $request->validate([
            'color_id' => 'required|exists:product_colors,id',
            'size_id' => 'required|exists:product_sizes,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'price_sale' => 'required|numeric',
            'SKU' => 'required|string|max:255',
            'is_active' => 'required|string|max:255',
            'type' => 'required|string|max:255'
        ]);
        foreach($data as $item){
            ProductVariant::create($item);
        }

        return response()->json(['message' => 'Product variant created'],201);
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
    public function update(Request $request, $productID)
    {
        $validatedData = $request->validate([
            'variants' => 'required|array',
            'variants.*.id' => 'required|exists:product_variants,id',
            'variants.*.color_id' => 'required|exists:product_colors,id',
            'variants.*.size_id' => 'required|exists:product_sizes,id',
            'variants.*.quantity' => 'required|integer',
            'variants.*.price' => 'required|numeric',
            'variants.*.price_sale' => 'required|numeric',
            'variants.*.SKU' => 'required|string|max:255',
            'variants.*.is_active' => 'required|string|max:255',
            'variants.*.type' => 'required|string|max:255'
        ]);

        // Lặp qua từng biến thể và cập nhật thông tin
        foreach ($validatedData['variants'] as $variant) {
            $productVariant = ProductVariant::find($variant['id']);
            if ($productVariant && $productVariant->product_id == $productID) {
                $productVariant->update($variant);
            } else {
                return response()->json(['message' => 'Product variant not found or does not belong to this product'], 404);
            }
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
