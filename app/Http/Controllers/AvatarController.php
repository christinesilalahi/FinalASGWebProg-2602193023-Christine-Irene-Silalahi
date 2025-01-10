<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avatar;

class AvatarController extends Controller
{
    public function index()
    {
        $avatars = Avatar::all();
        return view('avatars.index', compact('avatars'));
    }

    public function buy(Request $request)
    {
        $avatar = Avatar::findOrFail($request->avatar_id);
        $user = auth()->user();

        if ($user->coins >= $avatar->price) {
            $user->coins -= $avatar->price;
            $user->save();
            return back()->with('success', 'Avatar purchased successfully');
        }

        return back()->withErrors(['error' => 'Insufficient coins']);
    }

    public function send(Request $request)
    {
        
    }

    public function showTopup()
    {
        return view('avatars.topup');
    }

    public function topup()
    {
        $user = auth()->user();
        $user->coins += 100;
        $user->save();

        return back()->with('success', '100 coins added');
    }
}

