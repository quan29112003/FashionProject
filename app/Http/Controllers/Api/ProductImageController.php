<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductImage::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'productID' => 'required|exists:products,id',
            'url' => 'required|string|max:255',
        ]);

        return ProductImage::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductImage $productImage)
    {
        return $productImage;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductImage $productImage)
    {
        $request->validate([
            'productID' => 'required|exists:products,id',
            'url' => 'required|string|max:255',
        ]);

        $productImage->update($request->all());

        return $productImage;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();

        return response()->noContent();
    }
}
