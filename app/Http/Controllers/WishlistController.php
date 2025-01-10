<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->id())->get();
        return view('wishlist.index', compact('wishlists'));
    }

    public function add(Request $request)
    {
        Wishlist::create([
            'user_id' => auth()->id(),
            'wished_user_id' => $request->wished_user_id,
        ]);

        return back()->with('success', 'User added to wishlist');
    }

    public function respond(Request $request)
    {
        
    }
}

