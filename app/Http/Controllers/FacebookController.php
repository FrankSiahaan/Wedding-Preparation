<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $fbUser = Socialite::driver('facebook')->user();

        // Cek apakah email sudah ada
        $user = User::where('facebook_id', $fbUser->getId())
            ->orWhere('email', $fbUser->getEmail())
            ->first();

        if (!$user) {
            // Jika belum ada → buat user baru
            $user = User::create([
                'name' => $fbUser->getName(),
                'email' => $fbUser->getEmail(),
                'facebook_id' => $fbUser->getId(),
                'password' => bcrypt('facebook'), // password dummy
            ]);
        }

        Auth::login($user);

        return redirect()->route('home');
    }
}
