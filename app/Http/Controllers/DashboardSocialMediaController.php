<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardSocialMediaController extends Controller
{
    /**
     * Display a listing of the social media.
     */
    public function index()
    {
        $socialMedias = SocialMedia::all();
        return view('dashboard.socialmedias.index', compact('socialMedias'));
    }

    /**
     * Show the form for creating a new social media.
     */
    public function create()
    {
        return view('dashboard.socialmedias.create');
    }

    /**
     * Store a newly created social media in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'font_awesome_class' => 'required|string|max:255',
        ]);

        SocialMedia::create($request->all());

        return redirect()->route('dashboard.socialmedias.index')->with('success', 'Social Media created successfully.');
    }

    /**
     * Show the form for editing the specified social media.
     */
    public function edit(SocialMedia $socialMedia)
    {        
        return view('dashboard.socialmedias.edit', compact('socialMedia'));
    }     

    /**
     * Update the specified social media in storage.
     */
    public function update(Request $request, SocialMedia $socialMedia)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'font_awesome_class' => 'required|string|max:255',
    ]);

    $socialMedia->update($request->all());

    return redirect()->route('dashboard.socialmedias.index')->with('success', 'Social Media updated successfully.');
}

    

    /**
     * Remove the specified social media from storage.
     */
    public function destroy(SocialMedia $socialmedia)
    {
        $socialmedia->delete();
        return redirect()->route('dashboard.socialmedias.index')->with('success', 'Social Media deleted successfully.');
    }    
    
}
