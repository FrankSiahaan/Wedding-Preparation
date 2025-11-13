<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function storelogin(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => 'Email atau Password yang anda masukkan salah',
                'password' => 'Email atau Password yang anda masukkan salah',
            ]);
        };

        $request->session()->regenerate();

        return redirect()->route('home');
    }



    public function register()
    {
        return view('auth.register');
    }
}
