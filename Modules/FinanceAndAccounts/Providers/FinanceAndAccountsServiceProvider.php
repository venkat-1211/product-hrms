<?php

namespace Modules\FinanceAndAccounts\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\FinanceAndAccounts\Repositories\FinanceAndAccountsRepository;
use Modules\FinanceAndAccounts\Repositories\Interfaces\FinanceAndAccountsRepositoryInterface;

class FinanceAndAccountsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'finance-and-accounts');

        $this->app->bind(FinanceAndAccountsRepositoryInterface::class, FinanceAndAccountsRepository::class);
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
