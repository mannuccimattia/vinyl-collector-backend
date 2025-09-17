<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        // Admin Gate: name and email must match .env
        Gate::define("admin", function (User $user) {
            return (
                $user->name === env("APP_ADMIN_NAME") && $user->email === env("APP_ADMIN_MAIL")
            );
        });

        Paginator::useBootstrapFive();
    }
}
