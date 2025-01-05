<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DashboardBlogController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua blog dari database
        $blogs = Blog::all();

        // Mengirimkan data blog ke view
        return view('dashboard.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat blog baru
        return view('dashboard.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
            'content' => 'required|string',
        ]);

        // Jika ada gambar yang diupload, simpan gambar tersebut
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Membuat blog baru
        Blog::create($validatedData);

        // Redirect ke halaman daftar blog dengan pesan sukses
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        // Menampilkan detail blog
        return view('dashboard.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        // Menampilkan form edit blog
        return view('dashboard.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
            'content' => 'required|string',
        ]);

        // Jika ada gambar yang diupload, hapus gambar lama dan simpan gambar baru
        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::delete('public/' . $blog->image);
            }
            $imagePath = $request->file('image')->store('blogs', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Perbarui data blog
        $blog->update($validatedData);

        // Redirect ke halaman daftar blog dengan pesan sukses
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Hapus gambar dari storage jika ada
        if ($blog->image) {
            Storage::delete('public/' . $blog->image);
        }

        // Hapus blog dari database
        $blog->delete();

        // Redirect ke halaman daftar blog dengan pesan sukses
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
