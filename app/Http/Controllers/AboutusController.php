<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function show()
    {
        $artikel = Aboutus::latest()->paginate(5);
        return view('aboutus.index', compact('artikel'));
    }
}
