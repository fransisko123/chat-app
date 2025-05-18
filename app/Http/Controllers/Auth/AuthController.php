<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        dd($request->all());
    }

    public function registerPage()
    {
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
}
