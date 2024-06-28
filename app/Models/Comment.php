<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'productID',
        'userID',
        'comment',
        'createAt',
        'rating',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
