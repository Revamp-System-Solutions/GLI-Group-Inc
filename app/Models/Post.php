<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $appends = ['image_url'];
    protected $hidden = ['id', 'image_id'];
    function getImageUrlAttribute()
    {
        return $this->image ? '/rvmp-content/rvmp-uploads/' . $this->image : "";
    }

    public function subcategories()
    {
        return $this->belongsTo(Subcategories::class, 'subcategory_id');
    }
    public function media()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }
}
