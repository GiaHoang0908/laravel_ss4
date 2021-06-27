<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\News;
use App\Models\User;

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

        $menus = Category::has('children')->get();
        $users = User::all()->pluck('email')->toArray();
        $news = News::orderByDesc('created_at')->take(5)->get();
        view()->share(compact('menus', 'users', 'news'));

        Paginator::useBootstrap();
    }
}
