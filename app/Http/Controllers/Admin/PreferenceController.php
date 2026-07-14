<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreferenceController extends Controller
{
    public function index(Request $request)
    {
        $datas = Preference::latest()->get();
        return view('admin.Preferences.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.Preferences.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_np' => 'required|string|max:255',
            'name_eng' => 'required|string|max:255',
            'status' => 'required|boolean'
        ]);
        try{
            DB::beginTransaction();
            Preference::create($data);
            DB::commit();
            return redirect()->route('admin.preference.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो।');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(Preference $preference)
    {
        return view('admin.Preferences.form', compact('preference'));
    }

    public function update(Request $request, Preference $preference)
    {
        $data = $request->validate([
            'name_np' => 'required|string|max:255',
            'name_eng' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        
        try{
            DB::beginTransaction();
            $preference->update($data);
            DB::commit();
            return redirect()->route('admin.preference.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो।');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy(Preference $preference)
    {
        DB::beginTransaction();
        try {
            if ($preference) {
                $preference->delete();
                DB::commit();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
