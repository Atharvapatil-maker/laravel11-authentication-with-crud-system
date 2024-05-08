<?php

namespace App\Providers;

use Barryvdh\DomPDF\ServiceProvider as DomPDFServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register DomPDF service provider
        App::register(DomPDFServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register DomPDF facade alias
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('PDF', \Barryvdh\DomPDF\Facade::class);
    }
}
