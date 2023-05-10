<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use  HasFactory;
    protected $fillable = [
        'title',
        'description',
        'author',
        'publisher',
        'price',
        'images',
        'category_id'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
