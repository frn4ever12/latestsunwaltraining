<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TrainingApplication extends Model
{
    protected $fillable = ['user_id', 'training_id', 'fullname_np', 'fullname_eng','father_name','mother_name','grandfather_name','citizenship_no','citizenship_district_id', 'dob_bs', 'dob_ad', 'gender', 'email', 'contact_no', 'mobile_no','photo','nagrita_copy_front','nagrita_copy_back','application_miti_bs','remarks','employment_status','profession','work_experience_years','main_skill','other_skills','passport_copy','educational_certificate','recommendation_letter','disability_certificate','other_documents', 'status'];

    // Application Status Constants
    const STATUS_DRAFT = 'draft';
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SUBMITTED = 'submitted';
    const STATUS_DOCUMENT_VERIFICATION = 'document_verification';
    const STATUS_ELIGIBLE = 'eligible';
    const STATUS_NOT_ELIGIBLE = 'not_eligible';
    const STATUS_SHORTLISTED = 'shortlisted';
    const STATUS_SELECTED = 'selected';
    const STATUS_APPROVED = 'approved';
    const STATUS_DECLINED = 'declined';
    const STATUS_REJECTED = 'rejected';

    public function getStatusLabel()
    {
        return match($this->status) {
            self::STATUS_DRAFT => 'ड्राफ्ट',
            self::STATUS_PENDING => 'पेन्डिङ',
            self::STATUS_PROCESSING => 'प्रक्रियामा',
            self::STATUS_SUBMITTED => 'पेश गरियो',
            self::STATUS_DOCUMENT_VERIFICATION => 'कागजात प्रमाणीकरण',
            self::STATUS_ELIGIBLE => 'योग्य',
            self::STATUS_NOT_ELIGIBLE => 'अयोग्य',
            self::STATUS_SHORTLISTED => 'छनोट गरियो',
            self::STATUS_SELECTED => 'छनोट भयो',
            self::STATUS_APPROVED => 'स्वीकृत',
            self::STATUS_DECLINED => 'अस्वीकृत',
            self::STATUS_REJECTED => 'अस्वीकृत',
            default => 'अज्ञात',
        };
    }

    public function getStatusBadgeClass()
    {
        return match($this->status) {
            self::STATUS_DRAFT => 'bg-secondary',
            self::STATUS_PENDING => 'bg-warning',
            self::STATUS_PROCESSING => 'bg-info',
            self::STATUS_SUBMITTED => 'bg-info',
            self::STATUS_DOCUMENT_VERIFICATION => 'bg-warning',
            self::STATUS_ELIGIBLE => 'bg-primary',
            self::STATUS_NOT_ELIGIBLE => 'bg-danger',
            self::STATUS_SHORTLISTED => 'bg-info',
            self::STATUS_SELECTED => 'bg-success',
            self::STATUS_APPROVED => 'bg-success',
            self::STATUS_DECLINED => 'bg-danger',
            self::STATUS_REJECTED => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->application_no = self::generateApplicationNo();
        });
    }

    public static function generateApplicationNo()
    {
        return DB::transaction(function () {
            $currentYear = date('Y');

            $lastApp = self::where('application_no', 'like', 'TP-' . $currentYear . '-%')
                ->orderBy('id', 'desc')
                ->lockForUpdate()
                ->first();

            $lastNumber = 0;

            if ($lastApp && preg_match('/TP-' . $currentYear . '-(\d+)/', $lastApp->application_no, $matches)) {
                $lastNumber = (int) $matches[1];
            }

            $nextNumber = $lastNumber + 1;

            return 'TP-' . $currentYear . '-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
    public function theganaDetail()
    {
        return $this->hasOne(TaTheganaDetail::class);
    }
    public function educationDetails()
    {
        return $this->hasMany(TaEducationDetail::class);
    }
    
    public function anyeBibaranDetails()
    {
        return $this->hasMany(TaAnyeBibaranDetail::class);
    }
    public function experienceDetails()
    {
        return $this->hasMany(TaExperienceDetail::class);
    }
    public function familyDetails()
    {
        return $this->hasMany(TaFamilyDetail::class);
    }
    public function trainingAttendances() {
        return $this->hasMany(TrainingAttendance::class);
    }
}
