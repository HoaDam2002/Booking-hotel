<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
        //truyền dữ liệu user cho header admin
        view()->composer('admin.layout.header', function ($view) {
            $user = Auth::user();
            $view->with('name', $user->name ?? null);
            $view->with('avatar', $user->avatar ?? null);
        });
    }
}
