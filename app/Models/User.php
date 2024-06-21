<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameUser',
        'birthday',
        'age',
        'email',
        'address',
        'role',
        'type',
    ];

    protected $dates = ['birthday'];

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = $value;
        $this->attributes['age'] = Carbon::parse($value)->age;
    }
}
