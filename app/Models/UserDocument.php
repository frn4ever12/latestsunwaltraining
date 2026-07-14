<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    protected $fillable = [
        'user_id',
        'citizenship_front',
        'citizenship_back',
        'passport_size_photo',
        'academic_certificates',
        'experience_certificate',
        'recommendation_letter',
        'disability_card',
        'inclusion_certificate',
        'other_documents',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
