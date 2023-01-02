<?php

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

Route::get('', function () {
    $posts = Post::with(['category', 'user'])->get(); // we use with() for have less query (n +1 problem)
    return view('PostApp::posts', [
        'posts' => $posts
    ]);
});

Route::get('/{post:slug}', function (Post $post) { //here we use route model binding be careful to use -
    return view('PostApp::post', [                // -web middleware in service provider
       'post' => $post
    ]);
})->name('single-post');
