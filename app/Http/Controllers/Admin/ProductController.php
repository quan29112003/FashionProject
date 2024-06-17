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
    public function index(){
        $products = Product::with(['variants.color', 'variants.size','categories', 'images'])->get();
        dd($products);
        return view('admin.products.index',compact('products'));
    }

    public function create(Request $request){

        $category = Category::query()->pluck('name','id')->all();
        $product_color = ProductColor::query()->pluck('color','id');
        $product_size = ProductSize::query()->pluck('size','id');

        return view('admin.products.create', compact('category','product_color','product_size'));
    }

    public function store(Request $request){
        // $data = $request->productVariant;
        // dd($data);

        $dataProduct = $request->except('productVariant','product_images');

        $dataProductVariant = $request->productVariant;

        $dataProductImage = $request->product_images ? : [];


        // try{

        //     DB::beginTransaction();
        //     $product = Product::query()->create($dataProduct);
        //     foreach($dataProductVariant as $variant){
        //         $variant['product_id'] = $product->id;
        //         $variant = $this->cleanArrayKeys($variant);
        //         ProductVariant::query()->create([
        //             'product_id' => $product->id,
        //             'color_id' => $variant['color'],
        //             'size_id' => $variant['size'],
        //             'quantity' => $variant['quantity'],
        //             'price' => $variant['price'],
        //             'price_sale' => $variant['price_sale'],
        //             'SKU' => $variant['SKU'],
        //             'is_active' => $variant['is_active']
        //         ]);
        //     }

        //     foreach($dataProductImage as $img){
        //         $imageName = time(). '_' .$img->getClientOriginalName();
        //         $img->move(public_path('uploads'), $imageName);

        //         ProductImage::query()->create([
        //             'product_id' => $product->id,
        //             'url' => $imageName,
        //         ]);
        //     }

        //         DB::commit();
        //         return redirect()->view('admin.product.index');

        // }catch(\Exception $exception){
        //     DB::rollBack();
        //     return back();
        // }

        $product = Product::query()->create($dataProduct);
            foreach($dataProductVariant as $variant){
                $variant['product_id'] = $product->id;
                $variant = $this->cleanArrayKeys($variant);
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

            foreach($dataProductImage as $img){
                $imageName = time(). '_' .$img->getClientOriginalName();
                $img->move(public_path('uploads'), $imageName);

                ProductImage::query()->create([
                    'product_id' => $product->id,
                    'url' => $imageName,
                ]);
            }


    }


}
