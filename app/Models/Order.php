<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'cart_id',
        'nama_penerima',
        'tlp',
        'email',
    ];

    public function cart() {
        return $this->belongsTo('App\Cart', 'cart_id');
    }
}
