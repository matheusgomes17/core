<?php

namespace MVG\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider.
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //
    ];

    /**
     * Class event subscribers.
     *
     * @var array
     */
    protected $subscribe = [
        /*
         * Frontend Subscribers
         */

        /*
         * Auth Subscribers
         */
        \MVG\Listeners\Frontend\Auth\UserEventListener::class,

        /*
         * Backend Subscribers
         */

        /*
         * Auth Subscribers
         */
        \MVG\Listeners\Backend\Auth\User\UserEventListener::class,
        \MVG\Listeners\Backend\Auth\Role\RoleEventListener::class,

        /*
         * Catalog Subscribers
         */
        \MVG\Listeners\Backend\Catalog\Category\CategoryEventListener::class,
        \MVG\Listeners\Backend\Catalog\Product\ProductEventListener::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
