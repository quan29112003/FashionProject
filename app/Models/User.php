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


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

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
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    protected $dates = ['birthday'];

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = $value;
        $this->attributes['age'] = Carbon::parse($value)->age;
    }
    public function getTypeAttribute()
    {
        switch ($this->attributes['status']) {
            case 'Đang hoạt động':
                return 'Đang hoạt động';
            case 'Khóa tạm thời':
                return 'Khóa tạm thời';
            case 'Khóa vĩnh viễn':
                return 'Khóa vĩnh viễn';
        }
    }
    public function getRoleDescriptionAttribute()
    {
        switch ($this->attributes['role']) {
            case 0:
                return 'Khách hàng';
            case 1:
                return 'Nhân viên';
            case 2:
                return 'Admin';
        }
    }
}
