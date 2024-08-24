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
        $categoryGenders = CategoryGender::all(); // Giả sử bạn đã lấy các CategoryGender
        $catalogues = Catalogue::all(); // Giả sử bạn đã lấy các Catalogues

        $query = Product::with('variants', 'images');

        // Lọc theo category
        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
                // dd($query);
            }
        }
        // dd($request);
        // Lọc theo categorygender
        if ($request->has('categorygender')) {
            $categoryGender = CategoryGender::where('slug', $request->categorygender)->first();
            if ($categoryGender) {
                // Lấy tất cả các catalogue thuộc về categorygender này
                $catalogueIds = $categoryGender->catalogues->pluck('id');
                // Lọc sản phẩm theo các catalogue
                // dd($catalogueIds);
                $query->whereIn('catalogue_id', $catalogueIds);
                // dd($query);
            }
        }

        // Lọc theo catalogue
        if ($request->has('catalogue')) {
            $catalogue = Catalogue::where('slug', $request->catalogue)->first();
            if ($catalogue) {
                $query->where('catalogue_id', $catalogue->id);
                // dd($query);
            }
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
            ->get()
            ->map(function ($product) {
                // Attach the first variant to the product (if exists)
                $product->variant = $product->variants->first();
                // Clear the variants collection to only include the selected one
                $product->setRelation('variants', collect([$product->variant]));
                return $product;
            });
        $newProducts = $products->filter(function ($product) {
            return $product->created_at->greaterThan(now()->subDays(5));
        });
        return view('client.layouts.shop', compact('categories', 'sizes', 'colors', 'products', 'newProducts'));
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
