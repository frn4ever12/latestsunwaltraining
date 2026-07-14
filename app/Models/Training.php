<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $guarded = [];
    protected $casts = [
        'target_groups' => 'array',  
        'preferences' => 'array',  
    ];
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function trainingApplications()
    {
        return $this->hasMany(TrainingApplication::class);
    }
    public function trainingAttendances()
    {
        return $this->hasMany(TrainingAttendance::class);
    }
    public function trainingCertifications()
    {
        return $this->hasMany(TrainingCertification::class);
    }

    public function trainingBatches()
    {
        return $this->hasMany(TrainingBatch::class);
    }
   
    public function totalAttendances(){
        return $this->trainingAttendances()->count();
    }
    
    
}
