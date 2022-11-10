<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function index(){
        return view('dashboards.users.index');
    }
    function tentangkami(){
        return view('dashboards.users.tentangkami');
    }
    function artikel(){
        return view('dashboards.users.artikel');
    }
    function subartikel(){
        return view('dashboards.users.subartikel');
    }
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

