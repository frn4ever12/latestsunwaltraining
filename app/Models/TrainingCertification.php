<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingCertification extends Model
{
    protected $guarded=[];

    public function training(){
        return $this->belongsTo(Training::class);
    }
    public function trainingApplication(){
        return $this->belongsTo(TrainingApplication::class);
    }
    public function certificate(){
        return $this->belongsTo(Certificate::class);
    }
}
