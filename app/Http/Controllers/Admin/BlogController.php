<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'images/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $data['image'] = $filename;
        } elseif ($request->has('content')) {
            $matches = [];
            preg_match('/<img src="([^"]+)"/', $request->input('content'), $matches);
            if ($matches) {
                $image_url = $matches[1];
                $data['image'] = basename($image_url);
            }
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'images/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $data['image'] = $filename;
        } elseif ($request->has('content')) {
            $matches = [];
            preg_match('/<img src="([^"]+)"/', $request->input('content'), $matches);
            if ($matches) {
                $image_url = $matches[1];
                $data['image'] = basename($image_url);
            }
        }
    

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            unlink(public_path('images') . '/' . $blog->image);
        }
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'images/' . $filename;

            // Save the file
            Storage::disk('public')->put($filePath, file_get_contents($file));

            // Respond to CKEditor
            $url = Storage::url($filePath);
            return response()->json(['url' => $url]);
        }

        return response()->json(['url' => '']);
    }
    public function toggleStatus($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = $blog->status === 'draft' ? 'public' : 'draft';
        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Trạng thái của bài viết đã được thay đổi.');
    }
}