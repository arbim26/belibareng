<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $itemcart = optional(Order::where('status', 'cart')
                     ->where('user_id', $user->id)
                     ->first())->id;
        $data = Cart::where('order_id', $itemcart)->get();
        // dd($data);
        $total = $data->where('order_id', $itemcart)->sum('total');
        return view('dashboards.users.cart.index', compact('data', 'total'));
    }

    public function store(Request $request, Cart $cart) 
    {
        $this->validate($request, [
            'produk_id' => 'required',
        ]);
        $user = $request->user();
        $itemproduk = Product::findOrFail($request->produk_id);
        // dd($itemproduk->jumlah_pack);    
        $qty = 1;
        $harga = $itemproduk->harga;
        $order = Order::where('user_id', $user->id)
                        ->where('status', 'cart')
                        ->first();
        if ($order) {
            $itemorder = $order;
        }else{
            $inputorder['user_id'] = $user->id;
            $inputorder['status'] = 'cart';
            $itemorder = Order::create($inputorder);
        }
        $cekdetail = Cart::where('order_id', $itemorder->id)
                    ->where('produk_id', $itemproduk->id)
                    ->first();
        $no_invoice = Order::where('user_id', $user->id)->count();
        $number = mt_rand(10, 99);
        
        if ($cekdetail) {
            $cekdetail->updatedetail($cekdetail, $qty, $harga);
        } else {
            $inputancart['produk_id'] = $itemproduk->id;
            $inputancart['no_invoice'] = 'INV '.str_pad(($user->id),'5', ($number), STR_PAD_LEFT);;
            $inputancart['order_id'] = $itemorder->id;
            $inputancart['qty'] = $qty;
            $inputancart['harga'] = $harga;
            $inputancart['total'] = $harga * $qty;
            $itemdetail = Cart::create($inputancart);
        }
        return redirect()->route('cart.index')->with('success', 'barang berhasil di masukkan ke keranjang');
          
    }

    public function destroy($id)
    {
        $itemcart = Cart::findOrFail($id);;
        if ($itemcart->delete()) {
            return back()->with('successd', 'Item berhasil dihapus');
        } else {
            return back()->with('error', 'Item gagal dihapus');
        }
    }

    public function clear(Request $request) {
        $user = $request->user();
        $cart = Order::where('user_id', $user->id)
                    ->where('status', 'cart')
                    ->first();  
        $itemcart = Cart::where('order_id', $cart->id)
                        ->delete();
        return back()->with('success', 'Cart berhasil dikosongkan');
    }

    public function plus(Request $request, $id)
    {
        $cart = Cart::where('id', $id)->first();
        $harga = $cart->harga ;
        $qty = 1 ;
        $cart->plus($cart, $qty, $harga);
        return back();
    }

    public function min(Request $request, $id)
    {
        $cart = Cart::where('id', $id)->first();
        $harga = $cart->harga ;
        $qty = 1 ;
        $cart->minus($cart, $qty, $harga);
        return back();
    }



}
