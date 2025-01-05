<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        return User::all(); // Mengembalikan semua data user
    }

    // Menambahkan user baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Hash password sebelum menyimpan
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Buat user baru
        $user = User::create($validatedData);

        return response()->json($user, 201); // Return data user yang dibuat
    }

    // Mengupdate data user
    public function update(Request $request, $id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'username' => 'sometimes|string|unique:users,username,' . $user->id . '|max:255',
            'password' => 'sometimes|string|min:8',
        ]);

        // Jika ada password baru, hash dulu
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        // Update user
        $user->update($validatedData);

        return response()->json($user, 200); // Return data user yang diupdate
    }

    // Menghapus user
    public function destroy($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Hapus user
        $user->delete();

        return response()->json(null, 204); // Return tanpa data (success)
    }
}

