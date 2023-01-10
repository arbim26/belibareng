<?php

namespace App\Models;

use App\Models\Satuan;
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
        'image', 'barang', 'harga', 'stock', 'jumlah_pack', 'satuan_id', 'pack_id', 'content'
    ];


    public function stock($stock, $qty, $pack) {
        $this->attributes['stock'] = ($qty * $pack) - $stock;
        self::save();
    }

    public function satuan()
    {
        return $this->belongsTo('App\Models\Satuan', 'satuan_id');
    }
    public function pack()
    {
        return $this->belongsTo('App\Models\Pack', 'pack_id');
    }
}
