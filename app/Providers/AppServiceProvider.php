<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        $settings = \App\Models\Setting::first();
        Paginator::useBootstrap();
        View::share('recent_posts',\App\Models\Post::orderBy('id','desc')->limit($settings->recent_limit)->get());
        View::share('popular_posts',\App\Models\Post::orderBy('id','asc')->limit($settings->popular_limit)->get());
    }
}
