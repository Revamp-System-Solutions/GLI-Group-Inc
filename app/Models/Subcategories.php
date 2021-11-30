<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function post()
    {
        return $this->hasMany(Post::class, 'subcategory_id', 'id');
    }
}
