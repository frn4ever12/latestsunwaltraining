<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrayogkartaBhumikaRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PrayogkartaBhumikaController extends Controller
{
   
    public function index()
    {
        $datas = Role::with('permissions')->get();
        return view('admin.Prayogkarta.Roles.index', compact('datas'));
    }

    public function create()
    {
        $permissions = Permission::all()->groupBy('group');
        return view('admin.Prayogkarta.Roles.form', compact('permissions'));
    }

    public function store(PrayogkartaBhumikaRequest $request)
    {
        DB::beginTransaction();
        try {
            $role = Role::create(['name' => $request->validated('name')]);

            if ($request->has('permissions')) {
                $permissionIds = $request->validated('permissions');
                $permissions = Permission::whereIn('id', $permissionIds)->get();
                
                $role->syncPermissions($permissions);
            }    
            DB::commit();
            return redirect()
                ->route('admin.prayog-karta-bhumika.index')
                ->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all()->groupBy('group');
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('admin.Prayogkarta.Roles.form', compact('role', 'permissions', 'rolePermissions'));
    }


    public function update(PrayogkartaBhumikaRequest $request, Role $role)
    {
        DB::beginTransaction();      
        try {
            $role->name = $request->validated('name');
            $role->save();
            
            if ($request->has('permissions')) {
                $permissionIds = $request->validated('permissions');
                $permissions = Permission::whereIn('id', $permissionIds)->get();
                
                $role->syncPermissions($permissions);
            } else {
                $role->syncPermissions([]);
            }
            
            DB::commit();
            
            return redirect()
                ->route('admin.prayog-karta-bhumika.index')
                ->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            return back()
                ->withInput()
                ->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }


    public function destroy(Role $role)
    {
        DB::beginTransaction();
        try {
            $usersWithRole = DB::table('model_has_roles')
                ->where('role_id', $role->id)
                ->count();
                
            if ($usersWithRole > 0) {
                return response()->json([
                    'status' => 422,
                    'message' => 'यो भूमिका प्रयोगकर्ताहरूलाई तोकिएको छ। पहिले भूमिका हटाउनुहोस्।'
                ], 422);
            }
            $role->delete();
            
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'भूमिका सफलतापूर्वक मेटियो'
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
           
            return response()->json([
                'status' => 500,
                'message' => 'भूमिका मेट्न असफल: ' . $e->getMessage()
            ], 500);
        }
    }
}