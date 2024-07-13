<?php

namespace App\Providers;

use App\Events\RegisterEvent;
use App\Listeners\EmailListener;
use App\Models\User;
use App\Policies\DashboardPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }
    protected $listen = [

        RegisterEvent::class => [EmailListener::class]
    ];
    protected $polycies = [
        User::class => DashboardPolicy::class
    ];
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('dashboard', [DashboardPolicy::class, 'dashBoard']);
    }
}
