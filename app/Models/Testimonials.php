<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;
    protected $fillable = [
        'ratings',
        'content',
        'client_name',
        'client_org',
        'status',
        'subcategory_id',
        'stars'
    ];

    protected $appends = ['image_url'];
    
    protected $hidden = [ 'status', 'updated_at'];

    function getImageUrlAttribute()
    {
        return $this->image ? '/rvmp-content/rvmp-uploads/' . $this->image : "";
    }
    public function subcategories()
    {
        return $this->belongsTo(Subcategories::class, 'subcategory_id');
    }
}
