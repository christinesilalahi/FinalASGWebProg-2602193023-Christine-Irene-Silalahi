<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'gender' => 'required|in:Male,Female',
            'field_of_work' => 'required|array|min:3',
            'linkedin_username' => 'required|string|max:255',
            'mobile_number' => 'required|digits_between:10,15',
            'country' => 'required|string',
        ]);

        $price = rand(100000, 125000);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'gender' => $validated['gender'],
            'field_of_work' => json_encode($validated['field_of_work']),
            'linkedin_username' => $validated['linkedin_username'] ?? null,
            'mobile_number' => $validated['mobile_number'],
            'country' => $validated['country'],
            'coins' => 100,
        ]);
        

        Auth::login($user);
        return redirect()->route('home');
    }
}
