<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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

        // If logged-in user is admin (vendor), redirect to vendor dashboard
        $user = Auth::user();
        if ($user && $user->role === 'admin') {
            // create vendor profile if it doesn't exist
            if (! $user->vendor) {
                Vendor::create([
                    'user_id' => $user->id,
                    'name' => $user->name . ' Store',
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address' => 'Alamat belum diatur',
                    'description' => 'Deskripsi toko belum diatur. Silakan update profil vendor Anda.',
                ]);
                $user->refresh();
            }

            return redirect()->route('vendor.dashboard');
        }

        return redirect()->route('home');
    }



    public function register()
    {
        return view('auth.register');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20'
        ]);

        $user->update($validated);

        return redirect()->route('user.profile')->with('success', 'Profile berhasil diupdate');
    }

    public function addresses()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        return view('user.addresses', compact('addresses'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
