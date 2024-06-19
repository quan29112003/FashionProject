<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSize;

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

    public function store(Request $request){
        $data = $request->all();
        ProductSize::create($data);

        return redirect()->route('size');
    }

    public function edit(Request $request,$id){
        $size = ProductSize::where('id',$id)->first();
        return view('admin.sizes.edit',compact('size'));
    }

    public function handleEdit(Request $request, $id){
        $data = $request->except('_token','_method');
        ProductSize::where('id',$id)->update($data);

        return redirect()->route('size');
    }
}

