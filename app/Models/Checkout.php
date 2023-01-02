<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkouts';
    protected $fillable = [
        'order_id',
        'user_id',
        'nama_penerima',
        'tlp',
        'email',
        'status',
    ];

    public function order() {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    
}
