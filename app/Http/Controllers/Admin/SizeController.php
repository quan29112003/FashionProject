<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSize;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    //

    public function index(){
        $size = ProductSize::all();

        return view('admin.sizes.index', compact('size'));
    }

    public function create(){
        return view('admin.sizes.create');
    }

    // public function store(Request $request){
    //     $data = $request->all();
    //     ProductSize::create($data);

    //     return redirect()->route('size');
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'size' => [
                'required',
                'regex:/^[A-Z0-9]+$/',
                'unique:product_sizes,size'
            ],
        ]);


        $size = new ProductSize();
        $size->size = $request->size;
        $size->save();

        return response()->json(['success' => true]);
    }

    // public function edit(Request $request,$id){
    //     $size = ProductSize::where('id',$id)->first();
    //     return view('admin.sizes.edit',compact('size'));
    // }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'size' => [
                'required',
                'regex:/^[A-Z0-9]+$/',
                'unique:product_sizes,size'
            ],
        ]);

        $size = ProductSize::findOrFail($id);
        $size->size = $request->size;
        $size->save();

        return response()->json(['success' => true]);
    }

    public function handleEdit(Request $request, $id){
        $data = $request->except('_token','_method');
        ProductSize::where('id',$id)->update($data);

        return redirect()->route('size');
    }
}

