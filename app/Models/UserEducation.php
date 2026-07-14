<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    protected $table = 'user_educations';

    protected $fillable = [
        'user_id',
        'education_level_id',
        'faculty_stream',
        'board_university',
        'institution_name',
        'passed_year',
        'gpa_percentage',
        'certificate_upload',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }
}
