<?php

use CategoryApp\Model\Category;
use Illuminate\Support\Facades\Route;

Route::get('{category:slug}', function (Category $category) {
    return view('CategoryApp::category', [
        'posts' => $category->posts
//            ->load(['category', 'author']) //here we use load for query problem(n+1 problem).
    ]);
});


