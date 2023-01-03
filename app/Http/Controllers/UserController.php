<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Misi;
use App\Models\User;
use App\Models\Visi;
use App\Models\Order;
use App\Models\Satuan;
use App\Models\Slider;
use App\Models\Aboutus;
use App\Models\Artikel;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function index(){
        $artikel = Artikel::latest()->get();
        $tentangkami = Aboutus::latest()->get();
        $products = Product::latest()->get();
        $sliders = Slider::latest()->get();
        $satuan = Satuan::all();
        return view('dashboards.users.index', compact('artikel','tentangkami','products','sliders','satuan'));
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
        return view('dashboards.users.detailartikel', compact('data'));
    }

    public function produk(){
        
        $products = Product::latest()->get();
        return view('dashboards.users.produk', compact('products'));
    }
    public function product($id)
    {
        $data = Product::find($id);
        $satuan = Satuan::all();
        return view('dashboards.users.detailproduk', compact('data','satuan'));
    }

    public function profile(Request $request, User $user)
    {
        // $user = $request->all();
        // $profile = $user->id;
        
        // dd($profile);

        $user = auth()->user();
        $profile = User::all();
        return view('dashboards.users.profile', compact('user','profile'));

        // if($request->file('image') == "") {
        //     $user = User::find($user->id);
        //     $user->update($request->all());
        // } else {x

        //     //hapus old image
        //     Storage::disk('local')->delete('public/users/'.$user->image);

        //     //upload new image
        //     $image = $request->file('image');
        //     $image->storeAs('public/users', $image->hashName());


        // }

        // // if($profile){
        //     //redirect dengan pesan sukses
        // return view('dashboards.users.profile', compact('profile'))->with(['success' => 'Data Berhasil Disimpan!']);
        // }else{
        //     //redirect dengan pesan error
        //     return redirect()->route('profile')->with(['error' => 'Data Gagal Disimpan!']);
        // }
    }
    
    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $profil
    * @return void
    */
    public function profileupdate(Request $request, User $user)
    {

        $request->validate([
            'name'   => 'required',
            'email'  => 'required',
            'telp'   => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir'   => 'required'
        ]);

        $profie = User::findOrFail($user->id);

        if($request->file('image') == "") {
            $profile = User::find($profile->id);
            $profile->update($request->all());
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/profiles/'.$profile->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/profiles', $image->hashName());

            $profile->update([
                'image'  => $image->hashName(),
                'name'   => $request->name,
                'email'  => $request->email,
                'telp'   => $request->telp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir'   => $request->tanggal_lahir
            ]);

        }
        if($profile){
            //redirect dengan pesan sukses
            return redirect()->route('dashboards.users.profile')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('dashboards.users.profile')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
        return view('dashboards.users.checkout', compact('data', 'total', 'user'));
    }

    function daftarpesanan(Request $request){
        $user = $request->user();
        $itemcart = optional(Order::where('status', 'checkout')
                    ->where('user_id', $user->id)
                    ->first())->id;
        $produk = Cart::where('order_id', $itemcart)->get();
        $checkout = checkout::where('user_id', $user->id)->get();
        $data = array('produk' => $produk,
                      'checkout' => $checkout);
        return view('dashboards.users.daftarpesanan', $data);
    }
}

