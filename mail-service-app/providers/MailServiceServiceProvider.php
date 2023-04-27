<?php

namespace MailServiceApp\providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MailServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->routeMap();
    }

    private function routeMap()
    {
        Route::prefix('services')
            ->name('services.')
            ->group(base_path('mail-service-app/routes/api.php'));
    }
}
