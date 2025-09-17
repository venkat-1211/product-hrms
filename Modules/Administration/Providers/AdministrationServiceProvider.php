<?php

namespace Modules\Administration\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Administration\Repositories\AdministrationRepository;
use Modules\Administration\Repositories\Interfaces\AdministrationRepositoryInterface;

class AdministrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'administration');

        $this->app->bind(AdministrationRepositoryInterface::class, AdministrationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
