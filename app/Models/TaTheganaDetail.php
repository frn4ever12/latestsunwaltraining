<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaTheganaDetail extends Model
{
    protected $fillable=[
        'sthyayi_province_id',
        'sthyayi_district_id',
        'sthyayi_sthaniya_taha_id',
        'sthyayi_ward_id',
        'sthyayi_tole_name',
        'asthyayi_province_id',
        'asthyayi_district_id',
        'asthyayi_sthaniya_taha_id',
        'asthyayi_ward_id',
        'asthyayi_tole_name',
        'migration_certificate',
    ];

    public function sthyayiProvince(){
        return $this->belongsTo(Province::class,'sthyayi_province_id');
    }
    public function sthyayiDistrict(){
        return $this->belongsTo(District::class,'sthyayi_district_id');
    }
    public function sthyayiSthaniyaTaha(){
        return $this->belongsTo(SthaniyaTaha::class,'sthyayi_sthaniya_taha_id');
    }
    public function sthyayiWard(){
        return $this->belongsTo(Ward::class,'sthyayi_ward_id');
    }
    public function asthyayiProvince(){
        return $this->belongsTo(Province::class,'asthyayi_province_id');
    }
    public function asthyayiDistrict(){
        return $this->belongsTo(District::class,'asthyayi_district_id');
    }
    public function asthyayiSthaniyaTaha(){
        return $this->belongsTo(SthaniyaTaha::class,'asthyayi_sthaniya_taha_id');
    }
    public function asthyayiWard(){
        return $this->belongsTo(Ward::class,'asthyayi_ward_id');
    }

    public function trainingApplication(){
        return $this->belongsTo(TrainingApplication::class);
    }
}
