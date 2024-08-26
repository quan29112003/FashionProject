<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Models\Catalogue;
use App\Models\CategoryGender;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = Category::all();
        $categoryGender = CategoryGender::all();
        $catalogue = Catalogue::all();

        return view('admin.categories.index', compact('category', 'categoryGender', 'catalogue'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    // public function store(Request $request){
    //     $data = $request->all();
    //     Category::create($data);
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->is_active = $request->is_active;
        $category->save();

        return response()->json(['success' => true]);
    }

    public function storeGender(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
        ]);

        $category = new CategoryGender();
        $category->name = $request->name;
        $category->save();

        return response()->json(['success' => true]);
    }

    // public function edit(Request $request,$id){
    //     $category = Category::where('id',$id)->first();
    //     return view('admin.categories.edit',compact('category'));
    // }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->is_active = $request->is_active;
        $category->save();
        return response()->json(['success' => true]);
    }

    public function updateGender(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
        ]);

        $category = CategoryGender::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return response()->json(['success' => true]);
    }

    public function handleEdit(Request $request, $id){
        $validated = $request->validate([
            'name' => [
                'required',

            ]
        ]);
        $data = $request->except('_token','_method');
        Category::where('id',$id)->update($data);

        return redirect()->route('category');
    }
}
