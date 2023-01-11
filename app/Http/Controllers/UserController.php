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
use App\Models\Article;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function index(){
        $artikel = Article::latest()->get();
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
        $artikel = Article::latest()->paginate(9);
        return view('dashboards.users.artikel', compact('artikel'));
    }

    public function detail($id)
    {
        $data = Article::find($id);
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
        $cart = Cart::where('produk_id', $id)->get();
        return view('dashboards.users.detailproduk', ['data' => $data, 'cart' => $cart, 'satuan' => $satuan]);
    }

    public function profile(Request $request, User $user)
    {
        $user = auth()->user();
        $profile = User::all();
        return view('dashboards.users.profile', compact('user','profile'));
    }
    
    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $profil
    * @return void
    */
    
    public function updateprofile(Request $request)
    {
        // dd($request);   
        // $this->validate($request, [
        //     'name'   => 'required','string','max:255',
        //     'email'  => 'required', 'string', 'email', 'max:255',
        //     'telp'   => 'required','max:15',
        // ]);
        $user = $request->user();
        $profile = User::findOrFail($user->id);
        if($request->file('image') == "") {
            $profile = User::find($profile->id);
            $profile->update($request->all());
        } else {
            //hapus old image
            Storage::disk('local')->delete('public/profiles/'.$profile->image);
            //upload new image
            $image = $request->file('image');
            // dd($image);
            $image->storeAs('public/profiles', $image->hashName());

            $profile->update([
                'image'           => $image->hashName(),
                'name'            => $request->name,
                'email'           => $request->email,
                'telp'            => $request->telp,
                'jenis_kelamin'   => $request->jenis_kelamin,
                'tanggal_lahir'   => $request->tanggal_lahir
            ]);

        }

        if($profile){
            //redirect dengan pesan sukses
            return redirect()->route('profile')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('profile')->with(['error' => 'Data Gagal Disimpan!']);
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
        $checkout = Checkout::where('user_id', $user->id)->orderBy('created_at','desc')->paginate(10);
        return view('dashboards.users.daftarpesanan', compact('checkout'));
    }
}

