<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $appends = ['images_url', 'category_name'];
    protected $hidden = ['id',];
    function getImagesUrlAttribute()
    {
        $urls = array();
        foreach(json_decode($this->images) as $img){
            $type =  explode( '.', $img );
            array_push($urls, [ 'url' => '/rvmp-content/rvmp-uploads/' . $img, 'name' => $img, 'type'=> 'image/'.$type[1] ]);
        }
        return $this->images ? $urls : "";
    }

    function getCategoryNameAttribute()
    {
        $catname = Subcategories::where('id', '=', $this->subcategory_id)->first();
        return $this->subcategory_id ?  $catname->name: "";
    }

    public function subcategories()
    {
        return $this->belongsTo(Subcategories::class, 'subcategory_id');
    }

}
