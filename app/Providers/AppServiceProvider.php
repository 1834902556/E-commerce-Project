<?php

namespace App\Providers;

use App\Models\CategoryModel;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

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
        FacadesView::composer('website.include.header',function($view){
            $view->with('categories',CategoryModel::all());
        });
    }
}
