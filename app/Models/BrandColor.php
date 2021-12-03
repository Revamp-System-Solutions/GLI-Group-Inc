<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias',
        'value',
    ];
    protected $hidden = [
        'var_name',
        'last_updated_by'
    ];
}
