<?php

namespace Modules\Recruitment\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Recruitment\Repositories\RecruitmentRepository;
use Modules\Recruitment\Repositories\Interfaces\RecruitementRepositoryInterface;

class RecruitmentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'recruitment');

        $this->app->bind(RecruitmentRepositoryInterface::class, RecruitmentRepository::class);
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
