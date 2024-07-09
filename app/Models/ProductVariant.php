<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'quantity',
        'price',
        'price_sale',
        'SKU',
        'is_active',
        'type'
    ];

    // public function color()
    // {
    //     return $this->belongsTo(ProductColor::class, 'color_id');
    // }

    // public function size()
    // {
    //     return $this->belongsTo(ProductSize::class, 'size_id');
    // }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'product_id');
    // }

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'color_id');
    }

    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'size_id');

    }
    public function productSize()
    {
        return $this->belongsTo(ProductSize::class, 'size_id');
    }

    public function productColor()
    {
        return $this->belongsTo(ProductColor::class, 'color_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');

    }
}
