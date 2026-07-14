<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\SthaniyaTaha;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDistricts(Request $request,$province)
    {
        $districts = District::where('province_id', $province)->get(['id', 'name']);
        return response()->json($districts);
    }
    public function getSthaniyaTaha(Request $request,$district)
    {
        $municipalities = SthaniyaTaha::where('district_id', $district)->get(['id', 'name']);
        return response()->json($municipalities);
    }
}
