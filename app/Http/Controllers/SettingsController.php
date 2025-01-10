<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function hide()
    {
        $user = auth()->user();

        if ($user->coins >= 50) {
            $user->coins -= 50;
            $user->visible = false;
            $user->profile_picture = 'bear_default_' . rand(1, 3) . '.jpg';
            $user->save();

            return back()->with('success', 'You are now hidden from the list');
        }

        return back()->withErrors(['error' => 'Insufficient coins']);
    }

    public function show()
    {
        $user = auth()->user();

        if ($user->coins >= 5) {
            $user->coins -= 5;
            $user->visible = true;
            $user->save();

            return back()->with('success', 'You are now visible on the list');
        }

        return back()->withErrors(['error' => 'Insufficient coins']);
    }
}

