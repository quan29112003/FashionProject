<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = Category::all();

        return view('admin.categories.index', compact('category'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $data = $request->all();
        Category::create($data);
    }

    public function edit(Request $request,$id){
        $category = Category::where('id',$id)->first();
        return view('admin.categories.edit',compact('category'));
    }

    public function handleEdit(Request $request, $id){
        $data = $request->except('_token','_method');
        Category::where('id',$id)->update($data);

        return redirect()->route('category');
    }
}
