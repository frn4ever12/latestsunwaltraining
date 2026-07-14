<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaAnyeBibaranDetail extends Model
{
    protected $fillable=['chalani_no','anye_document','document_name'];

    public function trainingApplication(){
        return $this->belongsTo(TrainingApplication::class);
    }
}
