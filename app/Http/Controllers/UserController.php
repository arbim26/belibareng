<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Product;
=======
use App\Models\Artikel;
>>>>>>> a4004f49c2d6dac581caaa1fb8e59928ea9d2d49
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
        $products = Product::latest()->paginate(10);
        return view('dashboards.users.produk', compact('products'));
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

