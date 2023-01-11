<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $itemalamatpengiriman = AlamatPengiriman::where('user_id', $itemuser->id)->paginate(10);
        $data = array('title' => 'Alamat Pengiriman',
                    'itemalamatpengiriman' => $itemalamatpengiriman);
        return view('alamatpengiriman.index', $data)->with('no', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Product::where("code", "=", $code)->first());

        return $code;
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $itemcart = Order::where('status', 'cart')
                     ->where('user_id', $user->id)
                     ->first();
        $cart = cart::where('order_id', $itemcart->id)->get();

        $sip = cart::where('order_id', $itemcart->id)->first();
        $produk = Product::where('id', $sip->produk_id)->first();
        $pack = $produk->jumlah_pack;
        $barang = $produk->barang_dipesan;

        $tanggal = Carbon::now()->isoFormat('D MMMM Y');
        // dd($tanggal);
        $no_invoice = Order::where('user_id', $user->id)->count();
        $number = mt_rand(10, 99); // better than rand()
        
        // dd($pack);
        foreach ($cart as $key => $carts) {      
            $inputanorder['tanggal'] = $tanggal;
            $inputanorder['cart_id'] = $carts->id;
            $inputanorder['qty'] = $carts->qty;
            $inputanorder['no_invoice'] = $carts->no_invoice; 
            $inputanorder['user_id'] = $user->id;
            $inputanorder['nama_penerima'] = $request->nama_penerima;
            $inputanorder['tlp'] = $request->telp;
            $inputanorder['email'] = $request->email;
            $inputanorder['status'] = "Menunggu Target";
            
            $itemorder = Checkout::create($inputanorder);
        }
        
        $qty = $sip->qty;
        $barang_dipesan = $barang + $pack * $qty;
        $produk->barang_dipesan($barang_dipesan);

        $barang_dipesan = $produk->barang_dipesan;
        $minimal_rilis = $produk->minimal_rilis;


        if ($barang_dipesan >= $minimal_rilis) {
            $produk->update(['status' => 'barang sudah rilis']);
        }

        $itemcart->update(['status' => 'checkout']);

        return redirect()->route('daftarpesanan')->with('success', 'Order berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itemalamatpengiriman = AlamatPengiriman::findOrFail($id);
        $itemalamatpengiriman->update(['status' => 'utama']);
        AlamatPengiriman::where('id', '!=', $id)->update(['status' => 'tidak']);
        return back()->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
