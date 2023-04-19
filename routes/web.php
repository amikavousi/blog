<?php

use App\Models\User;
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

/*
Route::get('/', function () {
    return view('posts');
});

Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+'); //validate Route url

Route::get('posts/{post:slug}', function (Post $post) {
   dd($post);
    return view('PostApp::post', [
        'post' => $post
   ]);
})->name('single-post');
*/
Route::get('', function (){
   return redirect('/posts');
});

Route::get('author/{author:name}', function (User $author){
    return view('user-post',[
        'posts' => $author->posts
//            ->load(['author', 'category']) //here we use load for query problem. we can use LOAD() or we can use $WITH in model
    ]);
});
