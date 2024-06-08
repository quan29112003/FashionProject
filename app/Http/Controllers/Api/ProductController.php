<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::with('variants', 'images')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryID' => 'required|exists:categories,id',
            'nameProduct' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product->load('variants', 'images');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'categoryID' => 'required|exists:categories,id',
            'nameProduct' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());

        return $product;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}
