<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameProduct',
        'description',
        'price',
        'quantity'

    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'productID');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'productID');
    }
}
