<?php

namespace App\Providers;

use App\Repositories\Interfaces\KarmachariRepositoryInterface;
use App\Repositories\Interfaces\OrganizationRepositoryInterface;
use App\Repositories\Interfaces\TrainingApplicationRepositoryInterface;
use App\Repositories\Interfaces\TrainingRepositoryInterface;
use App\Repositories\KarmachariRepository;
use App\Repositories\OrganizationRepository;
use App\Repositories\TrainingApplicationRepository;
use App\Repositories\TrainingRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OrganizationRepositoryInterface::class, OrganizationRepository::class);
        $this->app->bind(KarmachariRepositoryInterface::class, KarmachariRepository::class);
        $this->app->bind(TrainingRepositoryInterface::class, TrainingRepository::class);
        $this->app->bind(TrainingApplicationRepositoryInterface::class, TrainingApplicationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
