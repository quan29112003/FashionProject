<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // public function index()
    // {
    //     $wishlists = Wishlist::all();
    //     return view('admin.wishlists.index', compact('wishlists'));
    // }
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())
        ->with(['product.variants.color', 'product.variants.size', 'product.images'])
        ->get();
        return view('client.layouts.wishlist', compact('wishlists'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.wishlists.create', compact('users'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'userID' => 'required|exists:users,id',
    //     ]);

    //     Wishlist::create($request->all());
    //     return redirect()->route('admin.wishlists.index');
    // }

    public function add(Request $request, $productId)
    {
        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::id();
        $wishlist->product_id = $productId;
        $wishlist->save();


        return redirect()->back()->with('success', 'Product added to wishlist');
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

    // public function destroy($id)
    // {
    //     $wishlist = Wishlist::find($id);
    //     $wishlist->delete();
    //     return redirect()->route('admin.wishlists.index');
    // }

    // public function remove($id)
    // {
    //     $wishlist = Wishlist::find($id);
    //     if ($wishlist && $wishlist->user_id == Auth::id()) {
    //         $wishlist->delete();
    //         return redirect()->back()->with('success', 'Product removed from wishlist');
    //     }
    //     return redirect()->back()->with('error', 'Unable to remove product from wishlist');
    // }
    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);

        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['success' => true, 'message' => 'Product removed from wishlist successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not found in wishlist.']);
        }
    }
}
