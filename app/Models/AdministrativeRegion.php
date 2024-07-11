<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeRegion extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'name_en', 'code_name', 'code_name_en'];

}
