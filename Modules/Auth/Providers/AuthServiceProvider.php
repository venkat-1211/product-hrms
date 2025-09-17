<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Auth\Repositories\Interfaces\AuthRepositoryInterface;
use Modules\Auth\Repositories\AuthRepository;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'auth');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);

    }

    public function boot(): void
    {
        //
    }
}
