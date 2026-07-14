<?php

namespace App\Providers;

use App\Models\TrainingApplication;
use App\Policies\TrainingApplicationPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::automaticallyEagerLoadRelationships();
        Gate::policy(TrainingApplication::class, TrainingApplicationPolicy::class);

        // Share municipality name globally
        view()->composer(['trainee.includes.main', 'trainee.*'], function ($view) {
            $organization = \App\Models\Organization::first();
            $view->with('municipalityName', $organization ? $organization->name_np ?? 'नगरपालिका' : 'नगरपालिका');
        });
    }
}
