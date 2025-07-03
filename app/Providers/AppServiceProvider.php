<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL; // ✅ Add this line
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/students'; // Redirect to students page after login

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        parent::boot();

        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https'); // Force HTTPS for all routes in production
        }
    }
}
