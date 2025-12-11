<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    public function setPrimary($id)
    {
        $user = Auth::user();

        // Reset semua alamat user menjadi non-default
        $user->addresses()->update(['is_default' => false]);

        // Set alamat yang dipilih menjadi default
        $address = $user->addresses()->findOrFail($id);
        $address->update(['is_default' => true]);

        return redirect()->route('user.addresses')->with('success', 'Alamat utama berhasil diubah');
    }

    public function destroy($id)
    {
        $response = Http::delete("http://api-product.test/api/address/{$id}");

        if ($response->successful() && $response->json('data') == 0) {
            return redirect()->route('user.addresses')->with('error', 'Alamat utama tidak dapat dihapus');
        } elseif ($response->successful() && $response->json('data') == 1) {
            return redirect()->route('user.addresses')->with('success', 'Alamat berhasil dihapus');
        } else {
            return redirect()->route('user.addresses')->with('error', 'Gagal menghapus alamat');
        }
    }

    public function store(Request $request)
    {
        // $user->addresses()->create($validated);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $response = Http::post('http://api-product.test/api/address', $data);

        return redirect()->route('user.addresses')->with('success', $response->json()['message']);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'street' => 'nullable|string',
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
