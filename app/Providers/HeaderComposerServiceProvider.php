<?php

namespace App\Providers;

use App\Models\Categories;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HeaderComposerServiceProvider extends ServiceProvider
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
        View::composer('Component.Header', function ($view) {
            // Retrieve data from your database (e.g., categories) and pass it to the view.
            $categories = Categories::all(); // Replace with the actual code to retrieve your data
            $view->with('categories', $categories);
        });
    }
}
