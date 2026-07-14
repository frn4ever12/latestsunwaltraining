<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')->prefix('portal')->name('admin.')->group(base_path('routes/admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
$middleware->redirectGuestsTo(function (Request $request) {
            return route('register');
        });
        $middleware->alias([
            'my_file' => \App\Http\Middleware\TrainingApplicationFile::class,
            'already_applied' => \App\Http\Middleware\EnsureTrainingAlreadyApplied::class,
            'training_status' => \App\Http\Middleware\EnsureTrainingIsUpcoming::class,
            'profile_complete' => \App\Http\Middleware\ProfileComplete::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
