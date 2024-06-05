<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    public function show(){
        $blog = DB::table('blog')->select('id', 'image', 'title', 'content')->get();
        return view('admin.blog.show', compact('blog'));
    }

    public function add(){
        return view('admin.blog.add');
    }

    public function handleAdd(Request $request){
        if($request->isMethod('POST')){
            if($request->hasFile('image')){
                $image = $request->file('image');
                $title = $request->input('title');
                $content = $request->input('content');

                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);

                Blog::create([
                    'image' => 'uploads/' . $imageName,
                    'title' => $title,
                    'content' => $content
                ]);
            }
        }

        return redirect()->route('show-blog');
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function handleEdit(Request $request, $id){
        $blog = Blog::findOrFail($id);

        if($request->isMethod('POST')){
            $data = $request->only(['title', 'content']);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $data['image'] = 'uploads/' . $imageName;
            }

            $blog->update($data);
        }

        return redirect()->route('show-blog');
    }

    public function delete($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('show-blog');
    }
}

