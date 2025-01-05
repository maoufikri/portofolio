<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portofolio;
use App\Models\SocialMedia;
use App\Models\Profile;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::firstOrFail(); // Ambil profile pertama
        $blogs = Blog::latest()->take(3)->get();
        $portofolios = Portofolio::latest()->take(3)->get();
        $socialmedias = SocialMedia::all();

        return view('layout', compact('profile', 'blogs', 'portofolios', 'socialmedias'));
    }
}
