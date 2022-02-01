<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageLinks extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'href',
        'order',
        'icon',
        'has_dropdown',
        'parent_link',
        'is_parent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
