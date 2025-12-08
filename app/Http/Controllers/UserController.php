<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Vendor;
use App\Models\User;
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

    public function store(Request $request)
    {
        // Validasi input dari form registrasi
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required', 'accepted'],
        ], [
            'name.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'terms.required' => 'Anda harus menyetujui Syarat & Ketentuan',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => bcrypt($validated['password']),
            'role' => 'customer', // Default role untuk customer
        ]);

        // Redirect ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login dengan email dan password Anda.');
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

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024', // max 1MB
        ], [
            'profile_picture.required' => 'Silakan pilih gambar',
            'profile_picture.image' => 'File harus berupa gambar',
            'profile_picture.mimes' => 'Format gambar harus JPEG, PNG, JPG, atau GIF',
            'profile_picture.max' => 'Ukuran gambar maksimal 1 MB',
        ]);

        $user = Auth::user();

        // Hapus gambar lama jika ada
        if ($user->profile_picture) {
            $oldPath = public_path('storage/' . $user->profile_picture);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        // Upload gambar baru
        $file = $request->file('profile_picture');
        $path = $file->store('profile_pictures', 'public');

        // Update user profile picture
        $user->update(['profile_picture' => $path]);

        return back()->with('success', 'Foto profil berhasil diperbarui');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
