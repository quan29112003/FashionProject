<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = true; // Đảm bảo timestamps được bật
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_user',
        'email',
        'password',
        'birthday',
        'age',
        'address',
        'role',
        'type',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($user) {
            if ($user->birthday) {
                $birthDate = new \DateTime($user->birthday);
                $today = new \DateTime();
                $age = $today->diff($birthDate)->y;
                $user->age = $age;
            }
        });
    }

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
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'birthday' => 'date',
    ];

    // public function getAgeAttribute()
    // {
    //     return now()->diffInYears($this->birthday);
    // }

    // protected $dates = ['birthday'];

    // public function setBirthdayAttribute($value)
    // {
    //     $this->attributes['birthday'] = $value;
    //     // $this->attributes['age'] = Carbon::parse($value)->age;
    // }
}
