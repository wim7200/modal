<?php

namespace App\Providers;

use App\Events\NewUserRegistered;
use App\Listeners\SendNewUserRegisteredEmail;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            //SendNewUserRegisteredEmail::class  // dit is makkelijker
            //Failed::class,        // dit is een event dat Laravel zelf Dispatched...

        ],
        NewUserRegistered::class=>[             //dit is als er geen event uit Laravel zelf komt, moet je het zelf despatchen
            SendNewUserRegisteredEmail::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //parent::boot();
        //User::observe(UserObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
