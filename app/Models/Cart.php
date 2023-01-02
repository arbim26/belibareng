<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'produk_id',
        'order_id',
        'status_cart',
        'qty',
        'harga',
        'total',
    ];

    public function produk() {
        return $this->belongsTo('App\Models\Product', 'produk_id');
    }   

    // function untuk update qty, sama subtotal
    public function updatedetail($itemdetail, $qty, $harga) {
        $this->attributes['qty'] = $itemdetail->qty + $qty;
        $this->attributes['total'] = $itemdetail->total + ($qty * $harga);
        self::save();
    }

    public function plus($cart, $qty, $harga) {
        $this->attributes['qty'] = $cart->qty + $qty;
        $this->attributes['total'] = $cart->total + ($qty * $harga);
        self::save();
    }

    public function minus($cart, $qty, $harga) {
        $this->attributes['qty'] = $cart->qty - $qty;
        $this->attributes['total'] = $cart->total - ($qty * $harga);
        self::save();
    }
}
