<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\SidebarController;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('sidebarItems', SidebarController::getSidebarItems());
        });

        if ($this->app->environment('production') && isset($_SERVER['HTTPS'])) {
            URL::forceScheme('https');
        }

    }
}
