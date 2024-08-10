<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index()
    {
        $category = Banner::all();

        return view('admin.banners.index', compact('category'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'position' => 'required|integer',
            'status' => 'required|boolean',
        ])->validate();

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = Storage::disk('public')->put('banner', $image);
            $request->image = 'storage/' . $path;
        }

        Banner::create([
            'name' => $request->name,
            'image' => $request->image,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return redirect()->route('banner');
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'position' => 'required|integer',
            'status' => 'required|boolean',
        ])->validate();

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            Storage::disk('public')->delete($banner->image);
            $image = $request->file('image');
            $path = Storage::disk('public')->put('banner', $image);
            $request->image = 'storage/' . $path;
        } else {
            $request->image = $banner->image;
        }

        $banner->update([
            'name' => $request->name,
            'image' => $request->image,
            'position' => $request->position,
            'status' => $request->status,
        ]);
        return redirect()->route('banner');
    }
}
