<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaExperienceDetail extends Model
{
    protected $fillable=['sanstha_name','category_id','start_miti_bs','start_miti_ad','end_miti_bs','end_miti_ad','document'];

    public function trainingApplication(){
        return $this->belongsTo(TrainingApplication::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
