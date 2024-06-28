<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;


class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::all();
        return view('admin.wishlists.index', compact('wishlists'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.wishlists.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'userID' => 'required|exists:users,id',
        ]);

        Wishlist::create($request->all());
        return redirect()->route('admin.wishlists.index');
    }

    public function edit($id)
    {
        $wishlist = Wishlist::find($id);
        $users = User::all();
        return view('admin.wishlists.edit', compact('wishlist', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'userID' => 'required|exists:users,id',
        ]);

        $wishlist = Wishlist::find($id);
        $wishlist->update($request->all());
        return redirect()->route('admin.wishlists.index');
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect()->route('admin.wishlists.index');
    }
}




