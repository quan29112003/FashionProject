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
    public function index($productId)
    {
        $variants = ProductVariant::where('product_id', $productId)->get();
        return response()->json($variants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $productId)
    {
        $data = $request->validate([
            'color_id' => 'required|exists:product_colors,id',
            'size_id' => 'required|exists:product_sizes,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'type' => 'required|string',
            'SKU' => 'required|string',
            'is_active' => 'required|boolean',
        ]);

        $data['product_id'] = $productId;

        $variant = ProductVariant::create($data);

        return response()->json($variant, 201);
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
    public function update(Request $request, ProductVariant $productVariant)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'colorID' => 'required|exists:product_colors,id',
            'sizeID' => 'required|exists:product_sizes,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'type' => 'required|string|max:255',
        ]);

        $productVariant->update($request->all());

        return $productVariant;
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
