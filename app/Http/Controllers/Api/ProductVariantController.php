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
        var_dump($product_id);
        $data['product_id'] = $product_id;

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
