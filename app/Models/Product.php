<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    /**
    * fillable
    *
    * @var array
    */
    protected $fillable = [
        'image', 'barang', 'harga', 'stock', 'content'
    ];

    // public function cart()
    // {
    //     return $this->belongsTo(Cart::class);
    // }
}
