<?php

use Illuminate\Support\Facades\Route;
use MailServiceApp\controller\MailController;

Route::prefix('mailerlite')
    ->name('mailerlite.')
    ->group(function () {
        Route::post('new-sub', MailController::class)->name('new-sub');
    });

//Route::group('MailerChimp', function () {
//    Route::get('new-sub', function () {
//        $mailchimp = new ApiClient();
//
//        $mailchimp->setConfig([
//            'apiKey' => config('services.mail.mailchimp.key'),
//            'server' => config('services.mail.mailchimp.server')
//        ]);
//
//        $response = $mailchimp->lists->getAllLists();
//        dd($response);
//    });
//});
