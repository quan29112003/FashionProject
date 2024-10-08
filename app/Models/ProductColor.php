<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = ['color', 'color_code'];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'color_id');
    }
}
