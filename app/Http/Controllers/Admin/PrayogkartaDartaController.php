<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class PrayogkartaDartaController extends Controller
{
    public function index(){
        $datas=User::latest()->get();
        return view('admin.Prayogkarta.Registration.index',compact('datas'));
    }
    public function create(){
        return view('admin.Prayogkarta.Registration.form');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'exists:roles,name'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email_verified_at'=>['required','date'],
            'status'=>['sometimes','in:active,deactive'],
        ],[
            'name.required' => 'प्रयोगकर्ताको नाम आवश्यक छ।',
            'email.required' => 'इमेल ठेगाना आवश्यक छ।',
            'email.email' => 'मान्य इमेल ठेगाना प्रविष्ट गर्नुहोस्।',
            'email.unique' => 'यो इमेल ठेगाना पहिले नै प्रयोग भइसकेको छ।',
            'role.required' => 'भूमिका छनौट गर्नुहोस्।',
            'role.exists' => 'अमान्य भूमिका छनौट गरिएको छ।',
            'password.required' => 'पासवर्ड आवश्यक छ।',
            'password.confirmed' => 'पासवर्ड पुष्टिकरण मेल खाँदैन।',
        ]);
        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if (! $user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }
            $user->assignRole($request->role);
            DB::commit();
            return redirect()->route('admin.prayog-karta-darta.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        }catch(ValidationException $e){
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }

    }
    public function edit(User $user){
        return view('admin.Prayogkarta.Registration.form', compact('user'));
    }

    public function update(Request $request, User $user){
        $data=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'exists:roles,name'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'email_verified_at'=>['required','date'],
            'status'=>['sometimes','in:active,deactive'],
        ],[
            'name.required' => 'प्रयोगकर्ताको नाम आवश्यक छ।',
            'email.required' => 'इमेल ठेगाना आवश्यक छ।',
            'email.email' => 'मान्य इमेल ठेगाना प्रविष्ट गर्नुहोस्।',
            'email.unique' => 'यो इमेल ठेगाना पहिले नै प्रयोग भइसकेको छ।',
            'role.required' => 'भूमिका छनौट गर्नुहोस्।',
            'role.exists' => 'अमान्य भूमिका छनौट गरिएको छ।',
            'password.required' => 'पासवर्ड आवश्यक छ।',
            'password.confirmed' => 'पासवर्ड पुष्टिकरण मेल खाँदैन।',
        ]);
        DB::beginTransaction();
        try{
            $user->update($data);
            if (! $user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }
            $user->syncRoles($request->role);
            DB::commit();
            return redirect()->route('admin.prayog-karta-darta.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            if ($user) {
                $user->delete();
                DB::commit();
                return response()->json(['status' => 200, 'message' => 'User deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 404, 'message' => 'User not found'], 404);
        }
    }
}
