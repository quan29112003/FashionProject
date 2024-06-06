<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function show($id){
        $category = Category::find($id);

        if(!$category){
            return response()->json([
                'message' => 'Category not found'
            ],404);
        }

        return response()->json([
            'category' => $category
        ],200);
    }

    public function store(Request $request){
        try{
            Category::create([
                'name' => $request->name,
                'description' => $request->description
            ],200);

            return response()->json([
                'message' => "category succesfully create"
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => "Something wrong"
            ]);
        }
    }

    public function update(Request $request, $id){
        try{
            $category = Category::find($id);
            if(!$category){
                return $category->json([
                    'message' => 'Category not found'
                ],400);
            }

            $category->name = $request->name;
            $category->description = $request->description;

            $category->save();

            return response()->json([
                'message' => 'Category successfully update'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Something wrong'
            ],500);
        }
    }
}
