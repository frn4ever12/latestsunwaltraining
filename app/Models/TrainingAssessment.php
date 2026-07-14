<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingAssessment extends Model
{
    protected $fillable = [
        'training_id',
        'training_application_id',
        'training_batch_id',
        'assessment_type',
        'score',
        'max_score',
        'percentage',
        'grade',
        'status',
        'assessment_date',
        'remarks',
    ];

    protected $casts = [
        'score' => 'decimal:2',
        'max_score' => 'decimal:2',
        'percentage' => 'decimal:2',
        'assessment_date' => 'date',
    ];

    // Assessment Type Constants
    const TYPE_PRE_TEST = 'pre_test';
    const TYPE_POST_TEST = 'post_test';
    const TYPE_PRACTICAL = 'practical';

    // Status Constants
    const STATUS_PASSED = 'passed';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';

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

    public function getAssessmentTypeLabel()
    {
        return match($this->assessment_type) {
            self::TYPE_PRE_TEST => 'प्राथमिक परीक्षा',
            self::TYPE_POST_TEST => 'अन्तिम परीक्षा',
            self::TYPE_PRACTICAL => 'व्यावहारिक परीक्षा',
            default => 'अज्ञात',
        };
    }

    public function getStatusLabel()
    {
        return match($this->status) {
            self::STATUS_PASSED => 'उत्तीर्ण',
            self::STATUS_FAILED => 'अनुत्तीर्ण',
            self::STATUS_PENDING => 'विचाराधीन',
            default => 'अज्ञात',
        };
    }

    public function getStatusBadgeClass()
    {
        return match($this->status) {
            self::STATUS_PASSED => 'bg-success',
            self::STATUS_FAILED => 'bg-danger',
            self::STATUS_PENDING => 'bg-warning',
            default => 'bg-secondary',
        };
    }

    public function calculatePercentage()
    {
        if ($this->max_score > 0) {
            $this->percentage = ($this->score / $this->max_score) * 100;
        }
        return $this->percentage;
    }

    public function calculateGrade()
    {
        $percentage = $this->percentage ?? 0;
        
        return match(true) {
            $percentage >= 90 => 'A+',
            $percentage >= 80 => 'A',
            $percentage >= 70 => 'B+',
            $percentage >= 60 => 'B',
            $percentage >= 50 => 'C+',
            $percentage >= 40 => 'C',
            $percentage >= 30 => 'D',
            default => 'F',
        };
    }
}
