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
        'no_invoice',
        'status_cart',
        'qty',
        'harga',
        'total'
    ];

    public function produk() {
        return $this->belongsTo('App\Models\Product', 'produk_id');
    } 

    public function checkout() {
        return $this->hasMany('App\Models\Checkout');
    }   

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
