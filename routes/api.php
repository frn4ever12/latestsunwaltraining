<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Province;
use App\Models\District;
use App\Models\Area;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API routes for dependent dropdowns (no auth required for dropdowns)
Route::get('/districts/{provinceId}', function($provinceId) {
    try {
        $districts = District::where('province_id', $provinceId)->get(['id', 'name']);
        return response()->json($districts);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Districts not found'], 404);
    }
});

Route::get('/municipalities/{districtId}', function($districtId) {
    try {
        $municipalities = Area::where('district_id', $districtId)->get(['id', 'name']);
        return response()->json($municipalities);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Municipalities not found'], 404);
    }
});
