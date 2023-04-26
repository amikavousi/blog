<?php

use Illuminate\Support\Facades\Route;
use LoginRegisterApp\Controller\LoginRegisterController;
use LoginRegisterApp\Middleware\AuthCheck;
use LoginRegisterApp\Middleware\LoginValidation;

Route::get('login', [LoginRegisterController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login.view');

Route::post('login', [LoginRegisterController::class, 'login'])
    ->middleware(['guest', LoginValidation::class, AuthCheck::class])
    ->name('login');

Route::post('logout', [LoginRegisterController::class, 'logout'])
    ->middleware(['auth'])
    ->name('logout');
