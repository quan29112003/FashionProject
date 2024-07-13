<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user', 'product')
            ->whereHas('user', function ($query) {
                $query->whereIn('role', [0, 1]);
            })
            ->get();

        return view('admin.comments.index', compact('comments'));
    }
    public function toggleVisibility($id)
    {
        $comment = Comment::find($id);
        $comment->visible = !$comment->visible;
        $comment->save();

        return redirect()->route('admin.comments.index');
    }
    public function create()
    {
        $products = Product::all();
        $users = User::whereIn('role', [0, 1])->where('status', 'Đang hoạt động')->get();
        return view('admin.comments.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'productID' => 'required|exists:products,id',
            'userID' => 'required|exists:users,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|between:1,10',
        ]);
        $user = User::find($request->userID);

        if ($user->status !== 'Đang hoạt động') {
            return redirect()->route('admin.comments.create');
        }

        Comment::create($request->all());
        return redirect()->route('admin.comments.index');
    }
}
