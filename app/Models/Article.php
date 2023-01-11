<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

        /**
     * fillable
     *
     * @var array
     */
    protected $table = 'article';
    protected $fillable = [
        'image', 'title', 'content', 'date'
    ];
}
