<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'no_invoice',
        'status',
        'total',
    ];

    public function detail() {
        return $this->hasOne('App\Models\cart', 'order_id');
    }
}
