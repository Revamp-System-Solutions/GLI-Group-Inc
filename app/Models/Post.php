<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $appends = ['image_url'];
    protected $hidden = ['id'];
    function getImageUrlAttribute()
    {
        return $this->image ? '/rvmp-content/rvmp-uploads/' . $this->image : "";
    }
    public function postCategories()
    {
        return $this->belongsTo(PostCategories::class, 'category_id');
    }
}
