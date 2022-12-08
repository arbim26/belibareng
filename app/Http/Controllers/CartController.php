<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
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
        $produk = Product::get();
        $cart = Cart::where('user_id', $user->id)->get();
        $data = array('cart'=>$cart);
        // dd($data);
        session()->put('data', $data);
        return view('dashboards.users.cart.index', $data)->with('no', 1);
    }

    public function store(Request $request, Cart $cart) 
    {
        $this->validate($request, [
            'produk_id' => 'required',
        ]);
        $itemuser = $request->user();
        $itemproduk = Product::findOrFail($request->produk_id);
        $qty = 1;
        $harga = $itemproduk->harga;
        $cekdetail = Cart::where('user_id', $itemuser->id)
                    ->where('produk_id', $itemproduk->id)
                    ->first();
        if ($cekdetail) {
            $cekdetail->updatedetail($cekdetail, $qty, $harga);
        } else {
            $itemdetail = Cart::create([
                'produk_id' => $itemproduk->id,
                'user_id' => $itemuser->id,
                'status_cart' =>'cart',
                'qty' => $qty,
                'harga' => $harga,
                'total' => $harga * $qty,
            ]);
        }
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
          
    }

    public function clear(Request $request) {
        $user = $request->user();
        DB::table('cart')->where('user_id', $user->id)->delete();
        return back()->with('success', 'Cart berhasil dikosongkan');
    }

    public function destroy($id)
    {
        $itemcart = Cart::findOrFail($id);;
        // update total cart dulu
        if ($itemcart->delete()) {
            return back()->with('success', 'Item berhasil dihapus');
        } else {
            return back()->with('error', 'Item gagal dihapus');
        }
    }

}
