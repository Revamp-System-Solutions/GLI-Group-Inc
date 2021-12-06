<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RvmpStatic extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    protected $hidden = ['id'];
    function getImageUrlAttribute()
    {
        return $this->image ? url('/rvmp-content/rvmp-static/' . $this->image) : "";
    }
}
