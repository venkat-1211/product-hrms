<?php

namespace Modules\Common\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Common\Repositories\CommonRepository;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            $sidebarModules = resolve(CommonRepository::class)->sidebarModules();
            $getCompany = resolve(CommonRepository::class)->getCompany();
            $view->with([
                'sidebarModules' => $sidebarModules,
                'company' => $getCompany,
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
