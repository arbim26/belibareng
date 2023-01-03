<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    function index(){
        return view('dashboards.admins.index');
    }
    function informasi(){
        return view('dashboards.admins.informasi');
    }

    function regiuser(){

        $table = User::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');
            
        return view('dashboards.admins.informasi', compact('user'));
    }

    function artiuser(){

        $artikelData = Artikel::select(\DB::raw("COUNT(*) as count"))
            ->whereID('created_at', date('Y'))
            ->groupBy(\DB::raw("Title(created_at)"))
            ->pluck('count');
            
        return view('dashboards.admins.informasi', compact('artikelData'));
    }
    
    function slider(){
        return view('dashboards.admins.slider');
    }
    function aboutus(){
        return view('dashboards.admins.aboutus');
    }
    function contactus(){
        return view('dashboards.admins.contactus');
    }
    function article(){
        return view('dashboards.admins.article');
    }
    function product(){
        return view('dashboards.admins.product');
    }
    function order(){
        return view('dashboards.admins.order');
    }
    function payment(){
        return view('dashboards.admins.payment');
    }
    function admin(){
        return view('dashboards.admins.profileadmin');
    }
    function user(){
        return view('dashboards.admins.accountuser');
    }
}