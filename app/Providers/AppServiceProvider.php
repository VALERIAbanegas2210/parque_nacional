<?php

namespace App\Providers;

use App\Models\usuario;
use App\Observers\UsuarioObserver;
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
        usuario::observe(UsuarioObserver::class);
    }
}