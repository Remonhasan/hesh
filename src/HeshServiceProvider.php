<?php

namespace Remonhasan\Hesh;

use Illuminate\Support\ServiceProvider;
use Remonhasan\Hesh\Middleware\Admin;

class HeshServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'hesh');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('admin', Admin::class);
        
    }

    public function register()
    {
    }
}
