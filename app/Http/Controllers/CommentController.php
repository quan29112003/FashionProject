<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user', 'product')->get();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('comments.create', compact('products', 'users'));
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
        return redirect()->route('comments.index');
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        $products = Product::all();
        $users = User::all();
        return view('comments.edit', compact('comment', 'products', 'users'));
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
        return redirect()->route('comments.index');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('comments.index');
    }
}







