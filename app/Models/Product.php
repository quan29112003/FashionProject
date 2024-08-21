<?php

namespace App\Models;

use App\Models\Comment;
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

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    // public function image()
    // {
    //     return $this->hasOne(ProductImage::class, 'product_id')->where('is_primary', true);
    // }
    // public function images()
    // {
    //     return $this->hasMany(ProductImage::class);
    // }

    // Relationship with categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function catalogue(){
        return $this->belongsTo(Catalogue::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class, 'productID');
    // }
    public function colors()
    {
        return $this->belongsToMany(ProductColor::class, 'product_id', 'color_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(ProductSize::class, 'product_id', 'size_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
