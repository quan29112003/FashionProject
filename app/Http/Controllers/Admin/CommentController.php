<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Comment;
use App\Models\Admin\Product;
use App\Models\Admin\User;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user', 'product')->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('admin.comments.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'productID' => 'required|exists:products,id',
            'userID' => 'required|exists:users,id',
            'comment' => 'required|string',
            'createAt' => 'required|date',
            'rating' => 'required|integer',
        ]);

        Comment::create($request->all());
        return redirect()->route('admin.comments.index');
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        $products = Product::all();
        $users = User::all();
        return view('admin.comments.edit', compact('comment', 'products', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'productID' => 'required|exists:products,id',
            'userID' => 'required|exists:users,id',
            'comment' => 'required|string',
            'createAt' => 'required|date',
            'rating' => 'required|integer',
        ]);

        $comment = Comment::find($id);
        $comment->update($request->all());
        return redirect()->route('admin.comments.index');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('admin.comments.index');
    }
}







