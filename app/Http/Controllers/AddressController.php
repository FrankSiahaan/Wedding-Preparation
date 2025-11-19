<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function setPrimary($id)
    {
        $user = Auth::user();

        // Reset semua alamat user menjadi non-primary
        $user->addresses()->update(['is_primary' => false]);

        // Set alamat yang dipilih menjadi primary
        $address = $user->addresses()->findOrFail($id);
        $address->update(['is_primary' => true]);

        return redirect()->route('user.addresses')->with('success', 'Alamat utama berhasil diubah');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);

        // Cegah penghapusan alamat utama
        if ($address->is_primary) {
            return redirect()->route('user.addresses')->with('error', 'Alamat utama tidak dapat dihapus');
        }

        $address->delete();

        return redirect()->route('user.addresses')->with('success', 'Alamat berhasil dihapus');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address_line1' => 'required|string',
            'address_line2' => 'nullable|string',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
            'is_primary' => 'boolean'
        ]);

        $user = Auth::user();

        // Jika ini alamat pertama atau set sebagai primary
        if ($user->addresses()->count() === 0 || ($request->is_primary ?? false)) {
            $user->addresses()->update(['is_primary' => false]);
            $validated['is_primary'] = true;
        }

        $user->addresses()->create($validated);

        return redirect()->route('user.addresses')->with('success', 'Alamat berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address_line1' => 'required|string',
            'address_line2' => 'nullable|string',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
        ]);

        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);
        $address->update($validated);

        return redirect()->route('user.addresses')->with('success', 'Alamat berhasil diupdate');
    }
}
