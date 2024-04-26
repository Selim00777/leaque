<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\UserLoggedIn;
use App\Listeners\UserLoggedInListener;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register repositories or other services using the $this->app->bind() method
        // Example: Registering a repository
        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository(new EloquentUserRepository());
        });
    }

    /**
     * Boot the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register event listeners using the Event facade or the injected dispatcher
        // Example: Listening to the user login event
        Event::listen(UserLoggedIn::class, [UserLoggedInListener::class, 'handle']);

        // Example: Using the injected dispatcher
        // $this->events->listen(UserLoggedIn::class, [UserLoggedInListener::class, 'handle']);
    }
}
