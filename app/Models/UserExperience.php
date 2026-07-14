<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    protected $table = 'user_experiences';

    protected $fillable = [
        'user_id',
        'organization_name',
        'position',
        'from_date',
        'to_date',
        'experience_type',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
