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
        'payment',
        'total_amount',
        'status_id',
        'payment_id',
        'voucher_id',
        'add_points',
        'first_name',
        'last_name',
        'name',
        'country',
        'address',
        'address2',
        'city',
        'state',
        'postcode',
        'phone',
        'email',
        'note',
        'created_at',
        'updated_at'
    ];

    // Define relationship with OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
