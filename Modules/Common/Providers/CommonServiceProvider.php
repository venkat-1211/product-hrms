<?php

namespace Modules\Common\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Common\Repositories\CommonRepository;
use Modules\Common\Repositories\Interfaces\CommonRepositoryInterface;
use Illuminate\Support\Facades\Blade;
use Modules\Common\View\Components\NoDataAvailable;
use Modules\Common\View\Components\DynamicButton;
use Modules\Common\View\Components\StatusBadge;
use Modules\Common\View\Components\SettingsNavbar;
use Modules\Common\View\Components\SettingsBreadCrumb;
use Modules\Common\View\Components\Action;
use Modules\Common\Helpers\PermissionHelper;

class CommonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'common');

        $this->app->bind(CommonRepositoryInterface::class, CommonRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::component('no-data-available', NoDataAvailable::class);
        Blade::component('dynamic-button', DynamicButton::class);
        Blade::component('status-badge',  StatusBadge::class);
        Blade::component('action',  Action::class);
        Blade::component('settings-navbar',  SettingsNavbar::class);
        Blade::component('settings-bread-crumb', SettingsBreadCrumb::class);

        Blade::directive('custom_date', function ($expression) {
            return "<?php echo ($expression) ? \Carbon\Carbon::parse($expression)->format('d M Y') : ''; ?>";
        });
        
        Blade::directive('currency', function ($expression) {
            return "<?php
                switch (trim($expression, \"'\\\"\")) {
                    case 'USD': echo '\$'; break;
                    case 'EUR': echo '€'; break;
                    case 'INR': echo '₹'; break;
                    case 'GBP': echo '£'; break;
                    case 'CAD': echo 'C\$'; break;
                    case 'JPY': echo '¥'; break;
                    default: echo $expression;
                }
            ?>";
        });

        Blade::if('companyPermission', function ($permission, $companyId = null) {
            return PermissionHelper::companyPermission($permission, $companyId);
        });

    }
}
