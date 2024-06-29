<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogue;
use App\Models\Category;

class CatalogueController extends Controller
{
    public function index(){
        $category = Category::select('id', 'name')->get();
        $catalogues = Catalogue::with('category')->get();

        return view('admin.catalogues.index', compact('catalogues', 'category'));
    }

    public function store(Request $request){
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // Create a new Catalogue
        $catalogue = new Catalogue();
        $catalogue->name = $request->name;
        $catalogue->description = $request->description;
        $catalogue->category_id = $request->category_id;
        $catalogue->save();

        // Return a success response with the category
        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $catalogue = Catalogue::findOrFail($id);
        $catalogue->name = $request->name;
        $catalogue->description = $request->description;
        $catalogue->category_id = $request->category_id;
        $catalogue->save();

        return response()->json(['success' => true]);
    }

}
