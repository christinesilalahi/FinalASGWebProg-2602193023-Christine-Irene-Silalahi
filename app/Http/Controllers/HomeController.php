<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::where('visible', true)->paginate(9);
        return view('home.index', compact('users'));
    }

    public function filter(Request $request)
    {
        $users = User::where('visible', true)
            ->where('gender', $request->gender)
            ->get();
        return view('home.index', compact('users'));
    }

    public function search(Request $request)
    {
        $users = User::where('visible', true)
            ->whereJsonContains('field_of_work', $request->field_of_work)
            ->get();
        return view('home.index', compact('users'));
    }
}

