<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaEducationDetail extends Model
{
    protected $guarded=[];

    public function trainingApplication(){
        return $this->belongsTo(TrainingApplication::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id'); 
    }

}
