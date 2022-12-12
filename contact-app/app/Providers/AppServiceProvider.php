<?php

namespace App\Providers;

use App\Models\Information;
use App\Observers\InformationObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Information::observe(InformationObserver::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Information::observe(InformationObserver::class);
    }
}
