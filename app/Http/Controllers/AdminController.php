<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('dashboards.admins.index');
    }
    function informasi(){
        return view('dashboards.admins.informasi');
    }
    function slider(){
        return view('dashboards.admins.slider');
    }
}
