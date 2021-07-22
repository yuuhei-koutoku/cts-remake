<?php

namespace App\Providers;

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
        // Viewファサードのshareメソッドを使うことで、全ビューで使える変数を定義(完全SSL化)
        $is_production = env('APP_ENV') === 'production' ? true : false;
        View::share('is_production', $is_production);
    }
}
