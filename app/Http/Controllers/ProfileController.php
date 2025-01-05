<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        // Ambil data pertama dari tabel profiles
        $profile = Profile::firstOrFail();
        return view('layout', compact('profile')); // Kirim data ke layout utama
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv_link' => 'nullable|url',
        ]);

        $path = null;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile_pictures', 'public');
        }

        Profile::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $path,
            'cv_link' => $request->cv_link,
        ]);

        return redirect()->route('profiles.index')->with('success', 'Profile created successfully!');
    }

    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv_link' => 'nullable|url',
        ]);

        if ($request->hasFile('photo')) {
            if ($profile->photo && Storage::exists('public/' . $profile->photo)) {
                Storage::delete('public/' . $profile->photo);
            }
            $profile->photo = $request->file('photo')->store('profile_pictures', 'public');
        }

        $profile->update([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $profile->photo,
            'cv_link' => $request->cv_link,
        ]);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully!');
    }

    public function destroy(Profile $profile)
    {
        if ($profile->photo && Storage::exists('public/' . $profile->photo)) {
            Storage::delete('public/' . $profile->photo);
        }

        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully!');
    }
}
