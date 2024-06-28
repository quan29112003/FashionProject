<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}



