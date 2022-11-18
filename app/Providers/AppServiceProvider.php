<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Color;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Support\ServiceProvider;
use View;

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
        View::composer(['*'],function ($view){
           $view->with('categories', Category::all());
        });
        View::composer(['*'],function ($view){
            $view->with('subCategories', SubCategory::all());
        });
        View::composer(['*'],function ($view){
            $view->with('childCategories', ChildCategory::all());
        });
        View::composer(['*'],function ($view){
            $view->with('colors', Color::all());
        });
        View::composer(['*'],function ($view){
            $view->with('brands', Brand::all());
        });
        View::composer(['*'],function ($view){
            $view->with('sizes', Size::all());
        });
        View::composer(['*'],function ($view){
            $view->with('units', Unit::all());
        });


    }
}
