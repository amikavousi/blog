<?php


use CommentApp\Controller\CommentController;
use CommentApp\middleware\CommentValidation;
use Illuminate\Support\Facades\Route;

Route::post('', [CommentController::class, 'store'])
    ->name('.new')
    ->middleware(['auth', CommentValidation::class]);
