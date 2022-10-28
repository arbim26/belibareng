<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function index(){
        $artikel = Artikel::latest()->get();
        return view('dashboards.users.index', compact('artikel'));
    }

    function tentangkami(){
        return view('dashboards.users.tentangkami');
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
    // artikel
    function produk(){
        return view('dashboards.users.produk');
    }
    function detailproduk(){
        return view('dashboards.users.detailproduk');
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

