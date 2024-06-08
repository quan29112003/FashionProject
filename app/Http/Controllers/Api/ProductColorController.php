<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductColor;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductColor::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'color' => 'required|string|max:255',
        ]);

        return ProductColor::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductColor $productColor)
    {
        return $productColor;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductColor $productColor)
    {
        $request->validate([
            'color' => 'required|string|max:255',
        ]);

        $productColor->update($request->all());

        return $productColor;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductColor $productColor)
    {
        $productColor->delete();

        return response()->noContent();
    }
}
