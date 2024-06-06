<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function index(){

        $users = Blog::all();

        return response()->json([
            'result' => $users
        ],200);
    }

    public function store(Request $request){
        try{
            Blog::create([
                'title' => $request->title,
                'image' => $request->image,
                'content' => $request->content
            ],200);

            return response()->json([
                "message" => "Blog succesfully create"
            ]);

        }catch(\Exception $e){
            return response()->json([
                'message' => "Something wrong"
            ]);
        }
    }

    public function show($id){
        $blog = Blog::find($id);

        if(!$blog){
            return response()->json([
                'message' => 'Blog not found'
            ],404);
        }

        return response()->json([
            'blog' => $blog
        ],200);
    }

    public function update(Request $request, $id){
        try{
            $blog = Blog::find($id);
            if(!$blog){
                return $blog->json([
                    'message' => 'Blog not found'
                ],404);
            }

            $blog->title = $request->title;
            $blog->image = $request->image;
            $blog->content = $request->content;

            $blog->save();

            return response()->json([
                'message' => 'Blog succesfully updated'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    public function destroy($id)
    {
        // Tìm biến thể sản phẩm theo ID và xóa nó
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return response()->json(null, 204);
    }
}
