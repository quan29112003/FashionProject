<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nameUser', 'email', 'password', 'role', 'address', 'birthday', 'age', 'status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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