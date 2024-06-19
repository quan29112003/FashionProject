<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['session_id', 'total', 'status'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
