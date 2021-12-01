<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    
    function getImageUrlAttribute()
    {
        return $this->image ? '/rvmp-content/rvmp-uploads/' . $this->image : "";
    }
    public function post()
    {
        return $this->hasMany(Post::class, 'image_id', 'id');
    }
}
