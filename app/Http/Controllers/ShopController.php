<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryGender;

class ShopController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();
        $sizes = ProductSize::all();
        $colors = ProductColor::all();

        $query = Product::with('variants', 'images');
        // Lọc sản phẩm theo CategoryGender, Category hoặc Catalogue
        if ($request->has('category')) {
            $categoryId = $request->input('category');
            $query->where('category_id', $categoryId);
        }

        // Lọc sản phẩm theo Catalogue
        if ($request->has('catalogue')) {
            $catalogueId = $request->input('catalogue');
            $query->where('catalogue_id', $catalogueId);
        }

        // Lọc sản phẩm theo CategoryGender qua mối quan hệ với bảng Catalogue
        if ($request->has('categoryGender')) {
            $categoryGenderId = $request->input('categoryGender');
            $query->whereHas('catalogue', function ($q) use ($categoryGenderId) {
                $q->where('category_gender_id', $categoryGenderId);
            });
        }

        // Apply sorting
        switch ($request->get('sort_by')) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'name_asc':
                $query->orderBy('name_product', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name_product', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc'); // Default sorting by newest
                break;
        }

        // Apply price filter
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = (float)$request->input('min_price');
            $maxPrice = (float)$request->input('max_price');

            $query->whereHas('variants', function ($q) use ($minPrice, $maxPrice) {
                $q->where('price', '>=', $minPrice)
                    ->where('price', '<=', $maxPrice);
            });
        }

        // Apply color and size filters
        if ($request->has('colors') || $request->has('sizes')) {
            $query->whereHas('variants', function ($q) use ($request) {
                $colors = $request->get('colors');
                $sizes = $request->get('sizes');

                if ($colors) {
                    $q->whereHas('productColor', function ($colorQuery) use ($colors) {
                        $colorQuery->whereIn('color', explode(',', $colors));
                    });
                }

                if ($sizes) {
                    $q->whereHas('productSize', function ($sizeQuery) use ($sizes) {
                        $sizeQuery->whereIn('size', explode(',', $sizes));
                    });
                }
            });
        }

        // Get products with their first variant based on some criteria
        $products = $query->with(['variants' => function ($query) {
            $query->orderBy('price'); // Assuming you want to order variants by price
        }, 'images'])
            ->where('is_active', 1)
            ->has('variants')
            ->get();

        $variantProducts = collect();
        foreach ($products as $product) {
            $variantProducts[$product->id] = $product->variants;
        }

        $products->each(function ($product) {
            $product->variant = $product->variants()->orderBy('price')->first();
            $product->setRelation('variants', collect([$product->variant]));
        });
        $newProducts = $products->filter(function ($product) {
            return $product->created_at->greaterThan(now()->subDays(5));
        });
        return view('client.layouts.shop', compact('categories', 'sizes', 'colors', 'products', 'newProducts', 'variantProducts'));
    }

    public function showCategory($id)
    {
        $categories = Category::all();
        $sizes = ProductSize::all();
        $colors = ProductColor::all();
        $products = Product::where('category_id', $id)->with('variants', 'images')->paginate(12);

        return view('shop.index', compact('categories', 'sizes', 'colors', 'products'));
    }
}
