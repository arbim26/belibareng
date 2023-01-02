<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Misi;
use App\Models\User;
use App\Models\Visi;
use App\Models\Slider;
use App\Models\Aboutus;
use App\Models\Artikel;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    public function updateprofile(Request $request, User $user)
    {
        
        $request->validate([
            'name'   => ['required','string','max:255'],
            'email'  => ['required', 'string', 'email', 'max:255'],
            'telp'   => ['required','max:15'],
            'jenis_kelamin' => ['required', ],
            'tanggal_lahir'   => 'required'
        ]);

        //get data Blog by ID
        $profile = User::findOrFail($user->id);

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

        // # check if user image is null, then validate
        // if (auth()->user()->image == null) {
        //     $validate_image = Validator::make($request->all(), [
        //         'image' => ['required', 'image', 'max:1000']
        //     ]);
        //     # check if their is any error in image validation
        //     if ($validate_image->fails()) {
        //         return response()->json(['code' => 400, 'msg' => $validate_image->errors()->first()]);
        //     }
        // }

        // # check if their is any error
        // if ($validated->fails()) {
        //     return response()->json(['code' => 400, 'msg' => $validated->errors()->first()]);
        // }

        // # check if the request has profile image
        // if ($request->hasFile('image')) {
        //     $imagePath = 'storage/' .auth()->image;
        //     # check whether the image exists in the directory
        //     if (File::exists($imagePath)) {
        //         # delete image
        //         File::delete($imagePath);
        //     }
        //     $image = $request->image->store('image','public');
        // }

        // # update the user info
        // auth()->user()->update([
        //     'name'   => $request->name,
        //     'email'  => $request->email,
        //     'telp'   => $request->telp,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'tanggal_lahir'   => $request->tanggal_lahir,
        //     'image'  => $image ?? auth()->user()->image
        // ]);
        // return response()->json(['code' => 200, 'msg' => 'profile updated successfully']);

        if($profile){
            //redirect dengan pesan sukses
            return redirect()->route('dashboards.users.profile')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('dashboards.users.profile')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // profile
    function alamat(){
        return view('dashboards.users.alamat');
    }
    function password(){
        return view('dashboards.users.password');
    }
    function daftarpesanan(){
        return view('dashboards.users.daftarpesanan');
    }
    function checkout(Request $request){
        $user = $request->user();
        $produk = Product::get();
        $cart = Cart::where('user_id', $user->id)->get();
        $data = array('cart'=>$cart);
        // dd($data);
        session()->put('data', $data);
        return view('dashboards.users.checkout', $data)->with('no', 1);
    }
}

