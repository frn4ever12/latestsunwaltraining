<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        // Personal Information
        'full_name_en',
        'full_name_np',
        'gender',
        'dob_bs',
        'dob_ad',
        'citizenship_no',
        'national_id_no',
        'passport_no',
        'marital_status',
        'blood_group',
        'mobile_number',
        'alternative_mobile',
        'email',
        'father_name',
        'mother_name',
        'grandfather_name',
        'spouse_name',
        'passport_photo',
        // Address Information
        'permanent_province_id',
        'permanent_district_id',
        'permanent_municipality_id',
        'permanent_ward_id',
        'permanent_tole',
        'permanent_house_no',
        'permanent_postal_code',
        'temp_same_as_permanent',
        'temp_province_id',
        'temp_district_id',
        'temp_municipality_id',
        'temp_ward_id',
        'temp_tole',
        'temp_house_no',
        'temp_postal_code',
        'citizenship_district_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'permanent_province_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'permanent_district_id');
    }

    public function municipality()
    {
        return $this->belongsTo(SthaniyaTaha::class, 'permanent_municipality_id');
    }

    public function permanentProvince()
    {
        return $this->belongsTo(Province::class, 'permanent_province_id');
    }

    public function permanentDistrict()
    {
        return $this->belongsTo(District::class, 'permanent_district_id');
    }

    public function permanentMunicipality()
    {
        return $this->belongsTo(SthaniyaTaha::class, 'permanent_municipality_id');
    }

    public function tempProvince()
    {
        return $this->belongsTo(Province::class, 'temp_province_id');
    }

    public function tempDistrict()
    {
        return $this->belongsTo(District::class, 'temp_district_id');
    }

    public function tempMunicipality()
    {
        return $this->belongsTo(SthaniyaTaha::class, 'temp_municipality_id');
    }
}
