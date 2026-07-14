<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $guarded=[];

    public function taTheganaDetails(){
        return $this->hasMany(TaTheganaDetail::class);
    }
}
