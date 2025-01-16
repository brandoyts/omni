<?php

namespace App\Providers;

use App\Repositories\CaseRepository;
use App\Repositories\Contracts\CaseRepositoryInterface;
use App\Repositories\Contracts\SwitchboardCategoryRepositoryInterface;
use App\Repositories\SwitchboardCategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CaseRepositoryInterface::class, CaseRepository::class);
        $this->app->bind(SwitchboardCategoryRepositoryInterface::class, SwitchboardCategoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
