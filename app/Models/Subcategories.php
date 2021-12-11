<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;
    protected $appends=['defined_permission'];
    protected $hidden=['id','category_id','permission'];

    function getDefinedPermissionAttribute()
    {
        return $this->permission=='-xw' ? ['<i class="fas fa-edit text-green-600"></i> Edit ','<i class="fas fa-trash-alt text-red-600"></i> delete']: '';
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function post()
    {
        return $this->hasMany(Post::class, 'subcategory_id', 'id');
    }
}
