<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TaFamilyDetail;
use Illuminate\Http\Request;

class TaFamilyDetailController extends Controller
{
    public function store(Request $request, $training, $application)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'relationship' => 'required|string',
            'occupation' => 'nullable|string',
            'mobile' => 'nullable|string',
        ]);

        $validated['training_application_id'] = $application;

        TaFamilyDetail::create($validated);

        return back()->with('success', 'परिवार सदस्य सफलतापूर्वक थपियो');
    }

    public function edit($training, $application, $detail)
    {
        $familyDetail = TaFamilyDetail::findOrFail($detail);
        return view('admin.TrainingApplication.Family.edit', compact('familyDetail', 'training', 'application'));
    }

    public function update(Request $request, $training, $application, $detail)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'relationship' => 'required|string',
            'occupation' => 'nullable|string',
            'mobile' => 'nullable|string',
        ]);

        $familyDetail = TaFamilyDetail::findOrFail($detail);
        $familyDetail->update($validated);

        return back()->with('success', 'परिवार सदस्य सफलतापूर्वक अपडेट भयो');
    }

    public function destroy($training, $application, $detail)
    {
        $familyDetail = TaFamilyDetail::findOrFail($detail);
        $familyDetail->delete();

        return response()->json([
            'status' => 200,
            'message' => 'परिवार सदस्य सफलतापूर्वक हटाइयो'
        ]);
    }
}
