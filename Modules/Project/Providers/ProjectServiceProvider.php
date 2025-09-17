<?php

namespace Modules\Project\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Project\Repositories\ProjectRepository;
use Modules\Project\Repositories\Interfaces\ProjectRepositoryInterface;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'project');

        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
