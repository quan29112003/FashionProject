<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = ['product__id', 'color__id', 'size__id', 'quantity', 'price','price_sale','SKU','is_active', 'type'];

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'color_id');
    }

    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'size_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
