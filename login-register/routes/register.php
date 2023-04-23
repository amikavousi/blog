<?php

use Illuminate\Support\Facades\Route;
use LoginRegisterApp\Controller\LoginRegisterController;
use LoginRegisterApp\Middleware\RegisterValidation;

Route::get('', [LoginRegisterController::class, 'showRegisterForm'])->name('view');
Route::post('newUser', [LoginRegisterController::class, 'Register'])
    ->middleware([RegisterValidation::class])
    ->name('newUser');