<?php

namespace Modules\Crm\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Crm\Repositories\CrmRepository;
use Modules\Crm\Repositories\Interfaces\CrmRepositoryInterface;

class CrmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'crm');

        $this->app->bind(CrmRepositoryInterface::class, CrmRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
