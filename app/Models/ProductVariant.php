<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = ['productID', 'colorID', 'sizeID', 'quantity', 'price', 'type'];

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'colorID');
    }

    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'sizeID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
}
