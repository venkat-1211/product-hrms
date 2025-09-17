<?php

namespace Modules\SuperAdmin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\SuperAdmin\Repositories\PackageRepository;
use Modules\SuperAdmin\Repositories\Interfaces\PackageRepositoryInterface;
use Modules\SuperAdmin\Repositories\CompanyRepository;
use Modules\SuperAdmin\Repositories\Interfaces\CompanyRepositoryInterface;

class SuperAdminProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'super-admin');

        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
