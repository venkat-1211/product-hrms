<?php

namespace Modules\Hrm\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Hrm\Repositories\HrmRepository;
use Modules\Hrm\Repositories\Interfaces\HrmRepositoryInterface;

class HrmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'hrm');

        $this->app->bind(HrmRepositoryInterface::class, HrmRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
