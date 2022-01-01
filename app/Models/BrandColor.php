<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
    ];
    protected $hidden = [
        'var_name',
        'id',
        'last_updated_by',
        'group'
    ];
}
