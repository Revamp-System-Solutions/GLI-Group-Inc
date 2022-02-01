<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    protected $hidden = ['id','image','type','created_at','updated_at'];
    function getImageUrlAttribute()
    {
        return $this->image && $this->type=='CLIENT_FILE' ? '/rvmp-content/rvmp-uploads/' . $this->image : '/rvmp-content/rvmp-static/' . $this->image;
    }
    // function getSiteBrandingAttribute()
    // {
    //     return $this->media_name && $this->type=='CLIENT_FILE' ? $this->media_name : '---' . $this->media_name;
    // }
  
}
