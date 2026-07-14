<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TaAnyeBibaranDetailController;
use App\Http\Controllers\Admin\TaEducationDetailController;
use App\Http\Controllers\Admin\TaExperienceDetailController;
use App\Http\Controllers\Admin\UserApprovalController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\TrainingController;
use App\Http\Controllers\Frontend\PrakashanController;
use App\Http\Controllers\Frontend\TrainingApplicationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// API routes for dependent dropdowns (web routes for Blade template access)
Route::get('/api/districts/{provinceId}', function($provinceId) {
    try {
        $districts = \App\Models\District::where('province_id', $provinceId)->get(['id', 'name']);
        return response()->json($districts);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Districts not found'], 404);
    }
});

Route::get('/api/municipalities/{districtId}', function($districtId) {
    try {
        $municipalities = \App\Models\Area::where('district_id', $districtId)->get(['id', 'name']);
        return response()->json($municipalities);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Municipalities not found'], 404);
    }
});

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/districts/{province}', [LocationController::class, 'getDistricts']);
Route::get('/municipalities/{district}', [LocationController::class, 'getSthaniyaTaha']);

// Registration routes (accessible without auth)
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
Route::get('verify-otp', [RegisteredUserController::class, 'showOtpVerification'])->name('verify.otp');
Route::post('verify-otp', [RegisteredUserController::class, 'verifyOtp']);
Route::post('resend-otp', [RegisteredUserController::class, 'resendOtp'])->name('resend.otp');

// Also add register routes within portal prefix for consistency
Route::prefix('portal')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('portal.register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('portal')->group(function () {
        // Dashboard route
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        
        // Load admin routes within portal prefix
        require __DIR__ . '/admin.php';
    });
    
    // Trainee Dashboard Route
    Route::middleware(['role:trainee'])->group(function () {
        Route::get('/trainee/dashboard', [\App\Http\Controllers\Trainee\DashboardController::class, 'index'])->name('trainee.dashboard');
    });
    
    // User Approval Routes (Super Admin only)
    Route::middleware(['role:super-admin'])->group(function () {
        Route::get('/admin/users/approval', [UserApprovalController::class, 'index'])->name('admin.users.approval');
        Route::get('/admin/applicants', [UserApprovalController::class, 'applicants'])->name('admin.applicants.index');
        Route::post('/admin/users/{user}/approve', [UserApprovalController::class, 'approve'])->name('admin.users.approve');
        Route::post('/admin/users/{user}/reject', [UserApprovalController::class, 'reject'])->name('admin.users.reject');
        Route::delete('/admin/users/{user}', [UserApprovalController::class, 'destroy'])->name('admin.users.destroy');
    });
    
    Route::middleware(['training_status'])->group(function () {
        Route::get('training-{training}-application', [TrainingApplicationController::class, 'index'])->name('training-application.index')->middleware('already_applied', 'profile_complete');
        Route::post('/training-{training}-application', [TrainingApplicationController::class, 'store'])->name('training-application.store')->middleware('already_applied', 'profile_complete');
        Route::get('/training-{training}/already-applied', [TrainingApplicationController::class, 'alreadyApplied'])->name('training-application.already-applied')  ;

        Route::get ('/training-{training}/application-{application}/confirmation', [TrainingApplicationController::class, 'confirmation'])
            ->name('training-application.confirmation')->middleware('already_applied');

        Route::get('/training-{training}/application-{application}/edit', [TrainingApplicationController::class, 'edit'])
            ->name('training-application.edit')->middleware('already_applied', 'profile_complete');

        Route::put('/training-{training}/application-{application}', [TrainingApplicationController::class, 'update'])
            ->name('training-application.update')->middleware('already_applied', 'profile_complete');

        Route::post('training-{training}-application-{application}/education', [TaEducationDetailController::class, 'store'])->name('training-application.education.store')->middleware('already_applied');
        Route::get('training-{training}-application-{application}/education/{detail}/edit', [TaEducationDetailController::class, 'edit'])->name('training-application.education.edit')->middleware('already_applied');
        Route::put('training-{training}-application-{application}/education/{detail}/update', [TaEducationDetailController::class, 'update'])->name('training-application.education.update')->middleware('already_applied');
        Route::delete('training-{training}-application-{application}/education/{detail}/destroy', [TaEducationDetailController::class, 'destroy'])->name('training-application.education.destroy')->middleware('already_applied');
      
        Route::post('training-{training}-application-{application}/experience', [TaExperienceDetailController::class, 'store'])->name('training-application.experience.store')->middleware('already_applied');
        Route::get('training-{training}-application-{application}/experience/{detail}/edit', [TaExperienceDetailController::class, 'edit'])->name('training-application.experience.edit')->middleware('already_applied');
        Route::put('training-{training}-application-{application}/experience/{detail}/update', [TaExperienceDetailController::class, 'update'])->name('training-application.experience.update')->middleware('already_applied');
        Route::delete('training-{training}-application-{application}/experience-{detail}/destroy', [TaExperienceDetailController::class, 'destroy'])->name('training-application.experience.destroy')->middleware('already_applied');
      
        Route::post('training-{training}-application-{application}/anye-bibaran', [TaAnyeBibaranDetailController::class, 'store'])->name('training-application.anye-bibaran.store')->middleware('already_applied');
        Route::get('training-{training}-application-{application}/anye-bibaran/{detail}/edit', [TaAnyeBibaranDetailController::class, 'edit'])->name('training-application.anye-bibaran.edit')->middleware('already_applied');
        Route::put('training-{training}-application-{application}/anye-bibaran/{detail}/update', [TaAnyeBibaranDetailController::class, 'update'])->name('training-application.anye-bibaran.update')->middleware('already_applied');
        Route::delete('training-{training}-application-{application}/anye-bibaran-{detail}/destroy', [TaAnyeBibaranDetailController::class, 'destroy'])->name('training-application.anye-bibaran.destroy')->middleware('already_applied');
      
        Route::post('training-{training}-application-{application}/family', [\App\Http\Controllers\Frontend\TaFamilyDetailController::class, 'store'])->name('training-application.family.store')->middleware('already_applied');
        Route::get('training-{training}-application-{application}/family/{detail}/edit', [\App\Http\Controllers\Frontend\TaFamilyDetailController::class, 'edit'])->name('training-application.family.edit')->middleware('already_applied');
        Route::put('training-{training}-application-{application}/family/{detail}/update', [\App\Http\Controllers\Frontend\TaFamilyDetailController::class, 'update'])->name('training-application.family.update')->middleware('already_applied');
        Route::delete('training-{training}-application-{application}/family-{detail}/destroy', [\App\Http\Controllers\Frontend\TaFamilyDetailController::class, 'destroy'])->name('training-application.family.destroy')->middleware('already_applied');
    
    });
    Route::get('file{filePath}', [FileController::class, 'servePrivateFile'])->name('file.show')->where('filePath', '.*')->middleware('can:view_private_file');

    Route::get('application/file-{filePath}', [FileController::class, 'servePrivateFile'])
        ->name('application-file.show')
        ->where('filePath', '.*')
        ->middleware(['signed', 'my_file']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Trainee Routes - moved outside auth group to prevent double portal prefix
Route::middleware(['auth', 'role:trainee'])->prefix('trainee')->name('trainee.')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\TraineeProfileController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [\App\Http\Controllers\Trainee\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\Trainee\ProfileController::class, 'update'])->name('profile.update');
    
    // Profile Tab Update Routes
    Route::patch('/profile/personal', [\App\Http\Controllers\TraineeProfileController::class, 'updatePersonal'])->name('profile.personal.update');
    Route::patch('/profile/address', [\App\Http\Controllers\TraineeProfileController::class, 'updateAddress'])->name('profile.address.update');
    Route::patch('/profile/education', [\App\Http\Controllers\TraineeProfileController::class, 'updateEducation'])->name('profile.education.update');
    Route::get('/profile/education/{id}', [\App\Http\Controllers\TraineeProfileController::class, 'getEducation'])->name('profile.education.get');
    Route::delete('/profile/education/{id}', [\App\Http\Controllers\TraineeProfileController::class, 'deleteEducation'])->name('profile.education.delete');
    Route::patch('/profile/documents', [\App\Http\Controllers\TraineeProfileController::class, 'updateDocuments'])->name('profile.documents.update');
    Route::patch('/profile/skills', [\App\Http\Controllers\TraineeProfileController::class, 'updateSkills'])->name('profile.skills.update');
    Route::patch('/profile/experience', [\App\Http\Controllers\TraineeProfileController::class, 'updateExperience'])->name('profile.experience.update');
    Route::get('/profile/experience/{id}', [\App\Http\Controllers\TraineeProfileController::class, 'getExperience'])->name('profile.experience.get');
    Route::delete('/profile/experience/{id}', [\App\Http\Controllers\TraineeProfileController::class, 'deleteExperience'])->name('profile.experience.delete');
    
    Route::get('/training', [\App\Http\Controllers\Trainee\TrainingController::class, 'index'])->name('training.index');
    Route::get('/training/{id}', [\App\Http\Controllers\Trainee\TrainingController::class, 'show'])->name('training.show');
    Route::get('/my-trainings', [\App\Http\Controllers\Trainee\TrainingController::class, 'myTrainings'])->name('my-trainings.index');
    
    Route::get('/attendance', [\App\Http\Controllers\Trainee\AttendanceController::class, 'index'])->name('attendance.index');
    
    Route::get('/assessment', [\App\Http\Controllers\Trainee\AssessmentController::class, 'index'])->name('assessment.index');
    Route::get('/assessment/{id}', [\App\Http\Controllers\Trainee\AssessmentController::class, 'show'])->name('assessment.show');
    
    Route::get('/certificate', [\App\Http\Controllers\Trainee\CertificateController::class, 'index'])->name('certificate.index');
    Route::get('/certificate/{id}', [\App\Http\Controllers\Trainee\CertificateController::class, 'download'])->name('certificate.download');
    
    Route::get('/notifications', [\App\Http\Controllers\Trainee\NotificationController::class, 'index'])->name('notifications.index');
    
    Route::get('/feedback', [\App\Http\Controllers\Trainee\FeedbackController::class, 'index'])->name('feedback.index');
    Route::post('/feedback', [\App\Http\Controllers\Trainee\FeedbackController::class, 'store'])->name('feedback.store');
    
    // API routes for cascading dropdowns
    Route::get('/api/districts/{province_id}', [\App\Http\Controllers\TraineeProfileController::class, 'getDistricts'])->name('api.districts');
    Route::get('/api/municipalities/{district_id}', [\App\Http\Controllers\TraineeProfileController::class, 'getMunicipalities'])->name('api.municipalities');
});

// Training Application Routes - outside trainee group to avoid prefix
Route::middleware(['auth', 'role:trainee'])->group(function () {
    Route::get('/training/{training}/application', [\App\Http\Controllers\Frontend\TrainingApplicationController::class, 'index'])
        ->name('training-application.index');
    Route::post('/training/{training}/application', [\App\Http\Controllers\Frontend\TrainingApplicationController::class, 'store'])
        ->name('training-application.store');
});
Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
Route::get('/training/{id}', [TrainingController::class, 'show'])->name('training.show');
Route::get('/samachar', [PrakashanController::class, 'samachar'])->name('samachar.index');
Route::get('/notice', [PrakashanController::class, 'notice'])->name('notice.index');
Route::get('/karyabidhi', [PrakashanController::class, 'karyabidhi'])->name('karyabidhi.index');
Route::get('/scheme', [PrakashanController::class, 'scheme'])->name('scheme.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

Route::get('/about', [AboutUsController::class, 'index'])->name('about.index');
Route::get('/about/{id}', [AboutUsController::class, 'show'])->name('about-us');

Route::resource('gallery', GalleryController::class)->only('index', 'show');

require __DIR__ . '/auth.php';
