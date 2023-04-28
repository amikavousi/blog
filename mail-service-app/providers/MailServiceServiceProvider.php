<?php

namespace MailServiceApp\providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;
use MailerLite\MailerLite;
use MailServiceApp\services\MailChimpService;
use MailServiceApp\services\MailerLiteService;
use MailServiceApp\services\MailServicesInterface;

class MailServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MailServicesInterface::class, function () {
            if (config('services.mail.mail_service') === 'MAILERLITE') {
                return new MailerLiteService(
                    new MailerLite(['api_key' => config('services.mail.mailer_lite.key')])
                );
            } elseif (config('services.mail.mail_service') === 'MAILCHIMP') {
                $client = (new ApiClient())->setConfig([
                    'apiKey' => config('services.mail.mailchimp.key'),
                    'server' => config('services.mail.mailchimp.server')
                ]);
                return new MailChimpService(
                    $client
                );
            } else{
                return back();
            }
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
        Route::prefix('mail-service')
            ->name('mail-service.')
            ->middleware('web')
            ->group(base_path('mail-service-app/routes/api.php'));
    }
}
