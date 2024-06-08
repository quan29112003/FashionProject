<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['cartID', 'variantID', 'quantity'];

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variantID');
    }
}
