<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Notifiable;

    protected $fillable = [
        'nameUser', 'email', 'password', 'role', 'address', 'type', 'birthday', 'age',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = [
        'type',
    ];

    protected $dates = ['birthday'];

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = $value;
        $this->attributes['age'] = Carbon::parse($value)->age;
    }
    
    public function getTypeAttribute()
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
