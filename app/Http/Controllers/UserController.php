<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Misi;
use App\Models\Visi;
use App\Models\Order;
use App\Models\Aboutus;
use App\Models\Artikel;
use App\Models\Product;
use App\Models\Checkout;
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
    function checkout(Request $request){
        $user = $request->user();
        $itemcart = optional(Order::where('status', 'cart')
                     ->where('user_id', $user->id)
                     ->first())->id;
        $data = Cart::where('order_id', $itemcart)->get();
        $total = $data->where('order_id', $itemcart)->sum('total');
        // dd($data->produk);
        return view('dashboards.users.checkout', compact('data', 'total', 'user'));
    }
    function daftarpesanan(Request $request){
        $user = $request->user();
        $itemcart = optional(Order::where('status', 'checkout')
                    ->where('user_id', $user->id)
                    ->first())->id;
        $produk = Cart::where('order_id', $itemcart)->get();
        $checkout = checkout::where('user_id', $user->id)->get();
        // dd($produk);
        $data = array('produk' => $produk,
                      'checkout' => $checkout);
        return view('dashboards.users.daftarpesanan', $data);
    }
}

