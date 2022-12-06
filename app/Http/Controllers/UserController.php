<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\Visi;
use App\Models\Aboutus;
use App\Models\Artikel;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function index(){
        $artikel = Artikel::latest()->get();
        $tentangkami = Aboutus::latest()->get();
        $products = Product::latest()->get();
        return view('dashboards.users.index', compact('artikel','tentangkami','products'));
    }

    function tentangkami(){
        $tentangkami = Aboutus::latest()->get();
        $visi = Visi::latest()->get();
        $misi = Misi::latest()->get();
        return view('dashboards.users.tentangkami', compact('tentangkami','visi','misi'));
    }

    // artikel
    function artikel(){
        $artikel = Artikel::latest()->paginate(9);
        return view('dashboards.users.artikel', compact('artikel'));
    }
    public function detail($id)
    {
        $data = Artikel::find($id);
        return view('artikel.detail', compact('data'));
    }
    public function product($id)
    {
        $data = Product::find($id);
        return view('dashboards.admins.products.detail', compact('data'));
    }
    // artikel
    public function produk(){
        $products = Product::latest()->paginate(10);
        return view('dashboards.users.produk', compact('products'));
    }
    function profile(){
        return view('dashboards.users.profile');
    }
    function alamat(){
        return view('dashboards.users.alamat');
    }
    function password(){
        return view('dashboards.users.password');
    }
    function cart(){
        return view('dashboards.users.cart');
    }
    function daftarpesanan(){
        return view('dashboards.users.daftarpesanan');
    }
}

