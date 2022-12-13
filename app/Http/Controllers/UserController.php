<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\Visi;
use App\Models\Slider;
use App\Models\Aboutus;
use App\Models\Artikel;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function index(){
        $artikel = Artikel::latest()->get();
        $tentangkami = Aboutus::latest()->get();
        $products = Product::latest()->get();
        $sliders = Slider::latest()->get();
        return view('dashboards.users.index', compact('artikel','tentangkami','products','sliders'));
    }

    function tentangkami(){
        $tentangkami = Aboutus::latest()->get();
        $visi = Visi::latest()->get();
        $misi = Misi::latest()->get();
        return view('dashboards.users.tentangkami', compact('tentangkami','visi','misi'));
    }

    // artikel
    function artikel(){
        $artikel = Artikel::latest()->paginate(9);
        return view('dashboards.users.artikel', compact('artikel'));
    }
    public function detail($id)
    {
        $data = Artikel::find($id);
        return view('dashboards.users.detailartikel', compact('data'));
    }
    // artikel

    // product
    public function produk(){
        
        $products = Product::latest()->get();
        return view('dashboards.users.produk', compact('products'));
    }
    public function product($id)
    {
        $data = Product::find($id);
        return view('dashboards.users.detailproduk', compact('data'));
    }
    // product

    // profile

    /**
     * index
     *
     * @return void
     */
    function profile()
    {
        $data = User::latest()->get();
        return view('dashboards.users.profile', $data);
    }

    public function update(Request $request, Profile $profile)
    {
        // dd($product);
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'telp'    => 'required',
            'date'    => 'required',
            'gender'  => 'required'
        ]);

        //get data Blog by ID
        $profile = Profile::findOrFail($profile->id);

        if($request->file('image') == "") {
            $profile = Profile::find($profile->id);
            $profile->update($request->all());
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/profiles/'.$profile->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/profiles', $image->hashName());

            $product->update([
                'image'     => $image->hashName(),
                'name'      => $request->name,
                'email'     => $request->email,
                'telp'     => $request->telp,
                'date'     => $request->date,
                'gender'   => $request->gender
            ]);

        }
        if($product){
            //redirect dengan pesan sukses
            return redirect()->route('profile')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('profile')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    
    // profile
    function alamat(){
        return view('dashboards.users.alamat');
    }
    function password(){
        return view('dashboards.users.password');
    }
    function cart(){
        return view('dashboards.users.cart');
    }
    function checkout(){
        return view('dashboards.users.checkout');
    }
    function daftarpesanan(){
        return view('dashboards.users.daftarpesanan');
    }
}

