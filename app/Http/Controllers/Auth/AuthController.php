<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function loginPage()
    {
        if (auth()->check()) {
            return redirect()->route('chat');
        }

        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (auth()->attempt($data)) {
            return redirect()->route('chat')->with('success', 'Login successful!');
        }

        return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
    }

    public function registerPage()
    {
        if (auth()->check()) {
            return redirect()->route('chat');
        }

        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        auth()->login($user);
        return redirect()->route('chat')->with('success', 'Registration successful!');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Logout successful!');
    }
}
