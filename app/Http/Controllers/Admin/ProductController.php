<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;




class ProductController extends Controller
{

    private function cleanArrayKeys(array $array)
    {
        $cleanedArray = [];
        foreach ($array as $key => $value) {
            $cleanedKey = trim($key, "'");
            $cleanedArray[$cleanedKey] = $value;
        }
        return $cleanedArray;
    }
    //
    // public function index()
    // {
    //     $products = Product::with(['variants.color', 'variants.size', 'category', 'images'])->get();

    //     return view('admin.products.index', compact('products'));
    // }

    public function index(Request $request)
    {
        $query = Product::with(['variants.color', 'variants.size', 'category', 'images']);
        $category = Category::all();

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $products = $query->get();
        $categories = Category::all(); // Get all categories

        return view('admin.products.index', compact('products','category'));
    }

    public function edit($id)
    {
        $category = Category::all();
        $product = Product::with(['category'])->where('id',$id)->get();
        $url = $product[0]->thumbnail;
        return view('admin.products.edit',compact('category','product','url'));
    }

    public function handleEdit(ProductRequest $request, $id){
        $data = $request->except('_token','_method');

        $data['is_active']  ??= 0;
        $data['is_hot']  ??= 0;
        $data['is_good_deal']  ??= 0;
        $data['is_show_home']  ??= 0;
        if ($request->hasFile('thumbnail')) {
            $img = $request->thumbnail;
            $thumbnailName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('uploads'), $thumbnailName);
            $data['thumbnail'] = $thumbnailName;
        }
        Product::where('id',$id)->update($data);
        return redirect()->route('product');
    }

    public function updateStatus(Request $request)
    {
        $product = Product::find($request->id);
        if ($product) {
            $field = $request->field;
            $value = $request->value == 'true' ? 1 : 0; // Convert 'true'/'false' to 1/0
            $product->$field = $value;
            $product->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }

    public function create(Request $request)
    {

        $category = Category::query()->pluck('name', 'id')->all();
        $product_color = ProductColor::query()->pluck('color', 'id');
        $product_size = ProductSize::query()->pluck('size', 'id');

        return view('admin.products.create', compact('category', 'product_color', 'product_size'));
    }

    public function store(ProductRequest $request)
    {

        $dataProduct = $request->except('productVariant', 'product_images');

        $dataProductVariant = $request->productVariant;

        $dataProductImage = $request->product_images ?: [];

        $img = $dataProduct['thumbnail'];
        $thumbnailName = time() . '_' . $img->getClientOriginalName();
        $img->move(public_path('uploads'), $thumbnailName);
        $dataProduct['is_active']  ??= 0;
        $dataProduct['is_hot']  ??= 0;
        $dataProduct['is_good_deal']  ??= 0;
        $dataProduct['is_show_home']  ??= 0;
        try {
            $product = Product::query()->create([
                'name_product' => $dataProduct['name_product'],
                'category_id' => $dataProduct['category_id'],
                'description' => $dataProduct['description'],
                'thumbnail' => $thumbnailName,
                "is_active" => $dataProduct['is_active'],
                "is_hot" => $dataProduct['is_hot'],
                "is_good_deal" => $dataProduct['is_good_deal'],
                "is_show_home" => $dataProduct['is_show_home']
            ]);

            foreach ($dataProductVariant as $variant) {
                $variant['product_id'] = $product->id;
                $variant = $this->cleanArrayKeys($variant);
                $variant['is_active']  ??= 0;
                ProductVariant::query()->create([
                    'product_id' => $product->id,
                    'color_id' => $variant['color'],
                    'size_id' => $variant['size'],
                    'quantity' => $variant['quantity'],
                    'price' => $variant['price'],
                    'price_sale' => $variant['price_sale'],
                    'SKU' => $variant['SKU'],
                    'is_active' => $variant['is_active']
                ]);
            }

            foreach ($dataProductImage as $img) {
                $imageName = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('uploads'), $imageName);

                ProductImage::query()->create([
                    'product_id' => $product->id,
                    'url' => $imageName,
                ]);
            }

            DB::commit();
            return redirect()->route('product');
        } catch (\Exception $exception) {
            DB::rollBack();

            return back();
        }
    }
}
