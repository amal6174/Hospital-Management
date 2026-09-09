<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\GeneralSettings;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Paginator::useBootstrapFive();



            View::composer('layouts.app', function ($view) {

            $departments = Category::where('status',1)->limit(5)->get();

            $general_settings = GeneralSettings::where('status',1)->pluck('value', 'field_name');



            $view->with('departments', $departments)
                  ->with('general_settings',$general_settings);




        });
    }
}
