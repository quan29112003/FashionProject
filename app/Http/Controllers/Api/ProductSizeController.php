<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSize;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductSize::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required|string|max:255',
        ]);

        return ProductSize::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSize $productSize)
    {
        return $productSize;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductSize $productSize)
    {
        $request->validate([
            'size' => 'required|string|max:255',
        ]);

        $productSize->update($request->all());

        return $productSize;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSize $productSize)
    {
        $productSize->delete();

        return response()->noContent();
    }
}
