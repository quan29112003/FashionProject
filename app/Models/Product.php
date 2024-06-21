<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name_product',
        'description',
        'thumbnail',
        'quantity'

    ];

    // public function variants()
    // {
    //     return $this->hasMany(ProductVariant::class, 'product_id');
    // }

    // public function images()
    // {
    //     return $this->hasMany(ProductImage::class, 'product_id');
    // }

    // public function image()
    // {
    //     return $this->hasOne(ProductImage::class, 'product_id')->where('is_primary', true);
    // }


    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'productID');
    }
}
