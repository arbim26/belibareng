<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    function produk(){
        return view('dashboards.users.produk');
    }
}

