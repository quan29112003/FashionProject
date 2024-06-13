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
    public function index()
    {
        return ProductVariant::with('color', 'size')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'productID' => 'required|exists:products,id',
            'colorID' => 'required|exists:product_colors,id',
            'sizeID' => 'required|exists:product_sizes,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'type' => 'required|string|max:255',
        ]);

        return ProductVariant::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductVariant $productVariant)
    {
        return $productVariant->load('color', 'size');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductVariant $productVariant)
    {
        $request->validate([
            'productID' => 'required|exists:products,id',
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
