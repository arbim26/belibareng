<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\Slider;
use App\Models\Aboutus;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artikel = Article::latest()->get();
        $tentangkami = Aboutus::latest()->get();
        $products = Product::latest()->get();
        $sliders = Slider::latest()->get();
        $satuan = Satuan::all();
        return view('beforeLogin.home', compact('artikel','tentangkami','products','sliders'));
    }
}
