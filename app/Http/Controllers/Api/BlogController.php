<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Blog::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function storeMultiple(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            '*.content' => 'required|string',
            '*.title' => 'required|string|max:255',
            '*.image' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        foreach ($data as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            Blog::create($item);
        }

        return response()->json(['message' => 'Blogs created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $blog = Blog::find($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $blog = Blog::findOrFail($id);
        $blog->update($request->all());
        return response()->json($blog, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Blog::destroy($id);
        return response()->json(null,204);
    }
}
