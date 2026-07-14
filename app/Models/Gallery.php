<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'status'
    ];

    public function photos()
    {
        return $this->hasMany(GalleryPhotos::class);
    }
}
