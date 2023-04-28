<?php

use Illuminate\Support\Facades\Route;
use MailServiceApp\controller\MailController;
use MailServiceApp\middleware\EmailValidation;


Route::post('new-sub', MailController::class)
    ->middleware(EmailValidation::class)
    ->name('new-sub');

