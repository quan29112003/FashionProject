<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGender extends Model
{
    use HasFactory;

    public function catalogues()
    {
        return $this->hasMany(Catalogue::class);
    }
}
