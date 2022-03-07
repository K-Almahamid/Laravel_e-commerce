<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'quantity',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];


    public function category()
    {
        //make relashin second parameter forg key and the third is primary key
        return $this->belongsTo(Category::class, 'category_id', 'id'); 
    }
}
