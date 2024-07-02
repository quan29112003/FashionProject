<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductColor;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
    //
    public function index()
    {
        $color = ProductColor::all();

        return view('admin.colors.index', compact('color'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    // public function store(Request $request){
    //     $data = $request->all();
    //     ProductColor::create($data);

    //     return redirect()->route('color');
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'color' => [
                'required',
                'unique:product_colors,color'
            ]
        ]);

        $color = new ProductColor();
        $color->color = $request->color;
        $color->color_code = $request->color_code;
        $color->save();

        return response()->json(['success' => true]);
    }


    // public function edit(Request $request, $id)
    // {
    //     $color = ProductColor::where('id', $id)->first();
    //     return view('admin.colors.edit', compact('color'));
    // }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'color' => [
                'required',
                'unique:product_colors,color'
            ]
        ]);

        $color = ProductColor::findOrFail($id);
        $color->color = $request->color;
        $color->color_code = $request->color_code;
        $color->save();

        return response()->json(['success' => true]);
    }

    public function handleEdit(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        ProductColor::where('id', $id)->update($data);

        return redirect()->route('color');
    }


}
