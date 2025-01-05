<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    
    public function allBlogs()
    {
        $blogs = Blog::latest()->paginate(6); // Pagination 6 per halaman
        return view('blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id); // Mencari blog berdasarkan ID, jika tidak ditemukan akan memunculkan error 404
        return view('blogs.show', compact('blog'));
    }
}

