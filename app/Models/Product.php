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
        'image', 
        'barang', 
        'harga', 
        'minimal_rilis', 
        'jumlah_pack', 
        'satuan_id', 
        'pack_id', 
        'status', 
        'content'
    ];


    public function barang_dipesan($barang_dipesan) {
        $this->attributes['barang_dipesan'] = $barang_dipesan;
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
