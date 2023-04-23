<?php

namespace LoginRegisterApp\Providers;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LoginRegisterServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->routeMap();
        $this->loadViewsFrom(base_path('login-register/resources'), 'LoginRegisterApp');
    }

    private function routeMap()
    {
        Route::middleware('web')
            ->prefix('register')
            ->name('register.')
            ->group(base_path('login-register/routes/register.php'));

        Route::middleware('web')
            ->prefix('login')
            ->name('login.')
            ->group(base_path('login-register/routes/login.php'));

    }

}
