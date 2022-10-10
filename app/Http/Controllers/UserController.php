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
<<<<<<< HEAD
}   
=======
    function artikel(){
        return view('dashboards.users.artikel');
    }
    function produk(){
        return view('dashboards.users.produk');
    }
}
>>>>>>> 48506eb051cfc0a96f009aeb45b3d1e4e8f63173
