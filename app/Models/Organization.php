<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $guarded=[];
    
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function district(){
        return $this->belongsTo(District::class);
    }
}
