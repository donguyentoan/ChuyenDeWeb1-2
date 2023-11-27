<?php

namespace App\Providers;

use App\Models\Categories;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('Component.Header', function ($view) {
           
             $categories = Categories::all();; // Lấy dữ liệu từ database, thay thế bằng truy vấn tương ứng của bạn
            $view->with('categories', $categories);
        });

        
    }
}
