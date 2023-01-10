<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkouts';
    protected $fillable = [
        'cart_id',
        'user_id',
        'qty',
        'nama_penerima',
        'tlp',
        'email',
        'no_invoice',
        'status',
    ];

    public function cart() {
        return $this->belongsTo('App\Models\cart', 'cart_id');
    }
    
}
