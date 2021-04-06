<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author',
        'about_author',
        'publisher',
        'date_published',
        'category_id',
        'image',
        'qty',
        'price',
        'pages',
        ''
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
