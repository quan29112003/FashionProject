<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [

        'name_user',
        'number_phone',
        'email',
        'password',
        'birthday',
        'age',
        'address',
        'role',
        'type',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($user) {
    //         if ($user->birthday) {
    //             $birthDate = new \DateTime($user->birthday);
    //             $today = new \DateTime();
    //             $age = $today->diff($birthDate)->y;
    //             $user->age = $age;
    //         }
    //     });
    // }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
