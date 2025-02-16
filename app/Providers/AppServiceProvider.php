<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    $router = $this->app['router'];
    $router->aliasMiddleware('is_admin', \App\Http\Middleware\IsAdmin::class);
    $router->aliasMiddleware('banned', \App\Http\Middleware\BannedUsers::class);

    }
}
