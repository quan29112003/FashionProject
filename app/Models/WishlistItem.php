<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    use HasFactory;

    protected $fillable = ['variantID', 'wishlistID'];

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class, 'wishlistID');
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variantID');
    }
}


