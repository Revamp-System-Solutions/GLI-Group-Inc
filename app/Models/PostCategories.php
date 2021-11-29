<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategories extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
