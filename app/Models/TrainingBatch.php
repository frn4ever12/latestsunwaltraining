<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingBatch extends Model
{
    protected $fillable = [
        'training_id',
        'batch_name',
        'batch_code',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'venue',
        'trainer_name',
        'trainer_contact',
        'max_participants',
        'current_participants',
        'status',
        'remarks',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function trainingApplications()
    {
        return $this->hasMany(TrainingApplication::class);
    }

    public function trainingAttendances()
    {
        return $this->hasMany(TrainingAttendance::class);
    }

    public function hasAvailableSeats()
    {
        return $this->current_participants < $this->max_participants;
    }

    public function getAvailableSeatsAttribute()
    {
        return $this->max_participants - $this->current_participants;
    }
}
