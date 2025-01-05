<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cek apakah user memiliki profile
        $profile = Profile::first(); // Mengambil data pertama dari tabel profile
        // Kirim data ke view
        return view('dashboard.profile.index', [
            'id' => $profile->id,
            'name' => $profile->name, // Nama user (hanya ada 1 user)
            'description' => $profile->description,
            'photo' => $profile->photo,
            'cv_link' => $profile->cv_link,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'bio' => 'required|max:255',
            'address' => 'required',
        ]);

        // Simpan profile baru
        Profile::create([
            'user_id' => Auth::id(),
            'bio' => $validated['bio'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('dashboard.profile.index')->with('success', 'Profile berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('dashboard.profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
{
    // Authorize profile hanya dengan ID
    $this->authorizeProfile($profile);

    return view('dashboard.profile.edit', compact('profile'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
{
    $this->authorizeProfile($profile);

    // Validasi input
    $validated = $request->validate([
        'name' => 'required|max:255',
        'description' => 'required|max:500',
        'photo' => 'nullable|image|max:2048',
        'cv_link' => 'nullable|url',
    ]);

    // Update photo jika ada
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('profile_photos', 'public');
        $validated['photo'] = $photoPath;
    }

    // Update profile
    $profile->update($validated);

    return redirect()->route('dashboard.profile.index')->with('success', 'Profile berhasil diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('dashboard.profile.index')->with('success', 'Profile berhasil dihapus!');
    }

    /**
 * Authorize access to profile.
 */
private function authorizeProfile(Profile $profile)
{
    // Check if profile exists
    if (!$profile) {
        abort(404, 'Profile not found.');
    }
}


}
