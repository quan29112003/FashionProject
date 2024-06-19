<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::all();
        return view('wishlists.index', compact('wishlists'));
    }

    public function create()
    {
        $users = User::all();
        return view('wishlists.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'userID' => 'required|exists:users,id',
        ]);

        Wishlist::create($request->all());
        return redirect()->route('wishlists.index');
    }

    public function edit($id)
    {
        $wishlist = Wishlist::find($id);
        $users = User::all();
        return view('wishlists.edit', compact('wishlist', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'userID' => 'required|exists:users,id',
        ]);

        $wishlist = Wishlist::find($id);
        $wishlist->update($request->all());
        return redirect()->route('wishlists.index');
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect()->route('wishlists.index');
    }
}




