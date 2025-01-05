<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMedias = SocialMedia::all(); // Ambil semua data social media
        return view('layout', compact('socialmedias'));
    }
}
