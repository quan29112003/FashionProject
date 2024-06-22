<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'voucher_id',
        'add_points',
    ];

    // Define relationship with OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
