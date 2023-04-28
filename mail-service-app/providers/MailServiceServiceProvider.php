<?php

namespace MailServiceApp\providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use MailerLite\MailerLite;
use MailServiceApp\services\MailerLiteService;

class MailServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MailerLiteService::class, function () {
            return new MailerLiteService(
                new MailerLite(['api_key' => config('services.mail.mailer_lite.key')])
            );
        });
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
