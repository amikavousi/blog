<?php

namespace PostApp\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
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
        $this->mapRoutes();
        $this->loadMigrationsFrom(base_path('post-app/migrations'));
        $this->loadViewsFrom(base_path('post-app/resources'), 'PostApp');
    }

    private function mapRoutes ()
    {
        Route::middleware('web')->prefix('posts')->name('posts.')
            ->group(base_path('post-app/routes/post.php'));
    }
}
