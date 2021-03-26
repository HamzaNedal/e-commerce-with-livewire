<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
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
        // if (request()->is('admin/*')) {
        //     view()->composer('*', function ($view) {
        //         if (!Cache::has('user_info')) {
        //             Cache::forever('user_info', auth()->user()->toArray());
        //         }

        //         $user_info = Cache::get('user_info');
        //         // dd($user_info);
        //         $view->with([
        //             'user_info' => $user_info,
        //         ]);
        //     });
        // }
    }
}
