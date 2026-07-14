<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryPhotos extends Model
{
    protected $fillable = [
        'gallery_id', 
        'photo', 
        'caption'
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
