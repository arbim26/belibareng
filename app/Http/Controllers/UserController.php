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
    function profile(){
        return view('dashboards.users.profile');
    }
    function alamat(){
        return view('dashboards.users.alamat');
    }
    function password(){
        return view('dashboards.users.password');
    }
}

