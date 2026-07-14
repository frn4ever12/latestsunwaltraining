<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'name_np',
        'contact_no',
        'photo',
        'status',
        'approval_status',
        'otp_code',
        'otp_expires_at',
        'is_verified',
        'dob_bs',
        'dob_ad',
        'gender',
        'father_name',
        'mother_name',
        'grandfather_name',
        'province_id',
        'district_id',
        'municipality_id',
        'ward_id',
        'tole',
        'highest_education',
        'institution',
        'main_skill',
        'experience_years',
        'other_skills',
        'citizenship_front',
        'citizenship_back',
        'educational_certificate',
        'profile_completion',
        'profile_completed',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function trainingApplications(){
        return $this->hasMany(TrainingApplication::class);
    }
    public function hasAppliedToTraining($trainingId)
    {
        return $this->trainingApplications()->where('training_id', $trainingId)->exists();
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function education()
    {
        return $this->hasMany(UserEducation::class);
    }

    public function documents()
    {
        return $this->hasOne(UserDocument::class);
    }

    public function skills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function experience()
    {
        return $this->hasMany(UserExperience::class);
    }

    public function calculateProfileCompletion()
    {
        $completion = 0;
        $profile = $this->profile;

        // Personal Information (25%)
        if ($profile) {
            $personalFields = [
                'full_name_en' => $profile->full_name_en ?? null,
                'full_name_np' => $profile->full_name_np ?? null,
                'gender' => $profile->gender ?? null,
                'dob_bs' => $profile->dob_bs ?? null,
                'dob_ad' => $profile->dob_ad ?? null,
                'citizenship_no' => $profile->citizenship_no ?? null,
                'mobile_number' => $profile->mobile_number ?? null,
                'email' => $profile->email ?? null,
                'father_name' => $profile->father_name ?? null,
                'mother_name' => $profile->mother_name ?? null,
                'grandfather_name' => $profile->grandfather_name ?? null,
                'passport_photo' => $profile->passport_photo ?? null,
            ];
            
            $personalComplete = true;
            foreach ($personalFields as $field => $value) {
                if (empty($value)) {
                    $personalComplete = false;
                    break;
                }
            }
            
            if ($personalComplete) {
                $completion += 25;
            }

            // Address Information (20%)
            $addressFields = [
                'permanent_province_id' => $profile->permanent_province_id ?? null,
                'permanent_district_id' => $profile->permanent_district_id ?? null,
                'permanent_municipality_id' => $profile->permanent_municipality_id ?? null,
                'permanent_ward_id' => $profile->permanent_ward_id ?? null,
            ];
            
            $addressComplete = true;
            foreach ($addressFields as $field => $value) {
                if (empty($value)) {
                    $addressComplete = false;
                    break;
                }
            }
            
            if ($addressComplete) {
                $completion += 20;
            }
        }

        // Education (20%)
        if ($this->education()->count() > 0) {
            $completion += 20;
        }

        // Documents (20%)
        $documents = $this->documents;
        if ($documents) {
            $docFields = [
                'citizenship_front' => $documents->citizenship_front ?? null,
                'citizenship_back' => $documents->citizenship_back ?? null,
                'passport_size_photo' => $documents->passport_size_photo ?? null,
                'academic_certificates' => $documents->academic_certificates ?? null,
            ];
            
            $docsComplete = true;
            foreach ($docFields as $field => $value) {
                if (empty($value)) {
                    $docsComplete = false;
                    break;
                }
            }
            
            if ($docsComplete) {
                $completion += 20;
            }
        }

        // Skills & Experience (15%)
        if ($this->skills()->count() > 0 || $this->experience()->count() > 0) {
            $completion += 15;
        }

        $this->update([
            'profile_completion' => $completion,
            'profile_completed' => $completion >= 100
        ]);

        return $completion;
    }
}
