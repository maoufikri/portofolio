<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PortofolioController extends Controller
{
    public function allPortofolios()
    {
        $portofolios = Portofolio::latest()->paginate(9); // Pagination untuk semua portofolio
        return view('portofolios.index', compact('portofolios'));
    }
}
