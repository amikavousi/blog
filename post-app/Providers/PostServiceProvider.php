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
    }

    private function mapRoutes ()
    {
        Route::prefix('post')->name('post')
            ->group(base_path('post-app/routes/web.php'));
    }
}
