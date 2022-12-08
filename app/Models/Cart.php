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
        'user_id',
        'status_cart',
        'qty',
        'harga',
        'total',
    ];

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

    public function produk() {
        return $this->belongsTo('App\Models\Product', 'produk_id');
    }

    public function clear() {
        {
            if ($this->fireEvent('clearing') === false) {
                return false;
            }
    
            $this->session->put(
                $this->sessionKeyCartItems,
                array()
            );
    
            $this->fireEvent('cleared');
            return true;
        }
    }
    

    // function untuk update qty, sama subtotal
    public function updatedetail($itemdetail, $qty, $harga) {
        $this->attributes['qty'] = $itemdetail->qty + $qty;
        $this->attributes['total'] = $itemdetail->total + ($qty * $harga);
        self::save();
    }
}
