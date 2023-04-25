<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(

'App\Http\Interfaces\UsersRepositoryInterface',
'App\Http\Eloquent\UserRepository',


       );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
