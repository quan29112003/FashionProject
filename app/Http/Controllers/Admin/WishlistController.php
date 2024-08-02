<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Models\User;
// use App\Models\Wishlist;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class WishlistController extends Controller
// {
    
//     public function index()
//     {
//         $wishlists = Wishlist::where('user_id', Auth::id())
//         ->with(['product.variants.color', 'product.variants.size', 'product.images'])
//         ->get();
//         return view('client.layouts.wishlist', compact('wishlists'));
//     }

//     public function create()
//     {
//         $users = User::all();
//         return view('admin.wishlists.create', compact('users'));
//     }


//     public function add(Request $request, $productId)
//     {
//         $wishlist = new Wishlist();
//         $wishlist->user_id = Auth::id();
//         $wishlist->product_id = $productId;
//         $wishlist->save();


//         return response()->json(['success' => true]);
//     }

//     public function edit($id)
//     {
//         $wishlist = Wishlist::find($id);
//         $users = User::all();
//         return view('admin.wishlists.edit', compact('wishlist', 'users'));
//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'userID' => 'required|exists:users,id',
//         ]);

//         $wishlist = Wishlist::find($id);
//         $wishlist->update($request->all());
//         return redirect()->route('admin.wishlists.index');
//     }

//     public function destroy($id)
//     {
//         $wishlist = Wishlist::find($id);

//         if ($wishlist) {
//             $wishlist->delete();
//             return response()->json(['success' => true, 'message' => 'Product removed from wishlist successfully.']);
//         } else {
//             return response()->json(['success' => false, 'message' => 'Product not found in wishlist.']);
//         }
//     }
// }



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
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

    public function add(Request $request, $productId)
    {
        $userId = Auth::id();

        // Check if the product is already in the wishlist
        $exists = Wishlist::where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        if ($exists) {
            return response()->json(['error' => 'Product is already in the wishlist'], 400);
        }

        // Add the product to the wishlist
        $wishlist = new Wishlist();
        $wishlist->user_id = $userId;
        $wishlist->product_id = $productId;
        $wishlist->save();

        return response()->json(['success' => true]);
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

        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['success' => true, 'message' => 'Product removed from wishlist successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not found in wishlist.']);
        }
    }
}
