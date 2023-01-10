<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'status',
        'total',
    ];

    public function cart() {
        return $this->hasOne('App\Models\cart', 'order_id');
    }
}
