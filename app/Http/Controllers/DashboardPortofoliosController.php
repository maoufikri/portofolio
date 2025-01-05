<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class DashboardPortofoliosController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil seluruh data portofolios dari database
        $portofolios = Portofolio::all();
        // Mengirimkan koleksi portofolio ke view
        return view('dashboard.portofolios.index', [
            'portofolios' => $portofolios, // Mengirim seluruh data portofolio ke view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengarahkan ke halaman form untuk membuat portofolio baru
        return view('dashboard.portofolios.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
            'url' => 'required|url',
        ]);
    
        // Menyimpan file gambar ke folder storage
        $imagePath = $request->file('image')->store('portofolios', 'public');
    
        // Membuat portofolio baru
        Portofolio::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $imagePath,
            'url' => $validatedData['url'],
        ]);
    
        // Mengarahkan kembali ke halaman daftar portofolio dengan pesan sukses
        return redirect()->route('dashboard.portofolios.index')->with('success', 'Portofolio created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Portofolio $portofolio)
    {
        // Logic untuk menampilkan detail portofolio
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portofolio $portofolio)
    {
        // dd($portofolio); 
        // Menampilkan form edit dengan data portofolio yang ingin diubah
        return view('dashboard.portofolios.edit', compact('portofolio'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
            'url' => 'required|url',
        ]);
    
        // Cek apakah ada gambar baru yang di-upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($portofolio->image) {
                Storage::delete('public/' . $portofolio->image);
            }
    
            // Menyimpan gambar baru
            $imagePath = $request->file('image')->store('portofolios', 'public');
            $portofolio->image = $imagePath;
        }
    
        // Update data portofolio
        $portofolio->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'url' => $validatedData['url'],
        ]);
    
        // Redirect ke halaman daftar portofolio
        return redirect()->route('dashboard.portofolios.index')->with('success', 'Portofolio updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portofolio $portofolio)
    {
        // Hapus gambar dari storage jika ada
        if ($portofolio->image) {
            Storage::delete('public/' . $portofolio->image);
        }
    
        // Hapus portofolio dari database
        $portofolio->delete();
    
        // Redirect ke halaman daftar portofolio dengan pesan sukses
        return redirect()->route('dashboard.portofolios.index')->with('success', 'Portofolio deleted successfully.');
    }
    
}
