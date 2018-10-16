<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\UserRepositoryInterface',
            'App\Repositories\Eloquents\UserRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\UpdateUserRepositoryInterface',
            'App\Repositories\Eloquents\UpdateUserRepository'
        );

//        $this->app->bind(
//            'App\Repositories\Contracts\UpdateUserRepositoryInterface',
//            'App\Repositories\Eloquents\Admin\UpdateUserRepository'
//        );

    }
}
