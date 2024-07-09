<?php

namespace App\Providers;

use App\Events\RegisterEvent;
use App\Listeners\EmailListener;
use Illuminate\Console\Scheduling\Event;
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
