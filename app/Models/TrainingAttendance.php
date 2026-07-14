<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingAttendance extends Model
{
    protected $fillable = [
        'training_id',
        'training_application_id',
        'training_batch_id',
        'attendance_date',
        'check_in_time',
        'check_out_time',
        'status',
        'remarks',
    ];

    protected $casts = [
        'attendance_date' => 'date',
        'check_in_time' => 'datetime',
        'check_out_time' => 'datetime',
    ];

    // Attendance Status Constants
    const STATUS_PRESENT = 'present';
    const STATUS_ABSENT = 'absent';
    const STATUS_LATE = 'late';
    const STATUS_EXCUSED = 'excused';

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function trainingApplication()
    {
        return $this->belongsTo(TrainingApplication::class);
    }

    public function trainingBatch()
    {
        return $this->belongsTo(TrainingBatch::class);
    }

    public function getStatusLabel()
    {
        return match($this->status) {
            self::STATUS_PRESENT => 'उपस्थित',
            self::STATUS_ABSENT => 'अनुपस्थित',
            self::STATUS_LATE => 'ढिलो',
            self::STATUS_EXCUSED => 'माफ',
            default => 'अज्ञात',
        };
    }

    public function getStatusBadgeClass()
    {
        return match($this->status) {
            self::STATUS_PRESENT => 'bg-success',
            self::STATUS_ABSENT => 'bg-danger',
            self::STATUS_LATE => 'bg-warning',
            self::STATUS_EXCUSED => 'bg-info',
            default => 'bg-secondary',
        };
    }
}
