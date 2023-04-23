<?php

use CategoryApp\Model\Category;
use PostApp\Controller\PostController;
use PostApp\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [PostController::class, 'index'])->name('all');
Route::get('/{post:slug}', [PostController::class, 'show'])->name('single-post');
