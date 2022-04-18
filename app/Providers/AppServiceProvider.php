<?php

namespace App\Providers;

use App\Models\User;
use App\Service\UserService;
use Illuminate\Support\ServiceProvider;
use App\Infra\Repository\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interfaces\Repository\UserRepositoryInterface', UserRepository::class);
        $this->app->bind('App\Interfaces\Repository\UserRepositoryInterface', function() {
            return new UserRepository(new User());
        });

        $this->app->bind('App\Interfaces\Service\UserServiceInterface', UserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
