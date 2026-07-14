<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaFamilyDetail extends Model
{
    protected $fillable = ['training_application_id', 'name', 'relationship', 'occupation', 'mobile'];

    public function trainingApplication()
    {
        return $this->belongsTo(TrainingApplication::class);
    }
}
