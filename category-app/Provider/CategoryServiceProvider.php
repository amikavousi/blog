<?php

namespace CategoryApp\Provider;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(base_path('category-app/resources'),'CategoryApp');
        $this->loadMigrationsFrom(base_path('category-app/migrations'));
    }

    private function routeMap()
    {
        Route::middleware(['web'])
            ->prefix('category')
            ->name('category.')
            ->group(base_path('category-app/routes/category.php'));
    }
}
