<?php

namespace CommentApp\Provider;

use CommentApp\components\Comment;
use CommentApp\components\NewComment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->routeMap();
        $this->loadMigrationsFrom(base_path('comment-app/migrations'));
        $this->loadViewsFrom(base_path('comment-app/resources'), 'CommentApp');
        $this->loadViewComponentsAs('CommentApp', [
            Comment::class,
            NewComment::class
        ]);
    }

    private function routeMap()
    {
        Route::prefix('comment')
            ->name('comment')
            ->middleware('web')
            ->group(base_path('comment-app/routes/web.php'));
    }
}
