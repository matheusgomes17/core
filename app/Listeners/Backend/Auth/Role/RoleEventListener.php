<?php

namespace MVG\Listeners\Backend\Auth\Role;

/**
 * Class RoleEventListener.
 */
class RoleEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Role Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Role Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Role Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \MVG\Events\Backend\Auth\Role\RoleCreated::class,
            'MVG\Listeners\Backend\Auth\Role\RoleEventListener@onCreated'
        );

        $events->listen(
            \MVG\Events\Backend\Auth\Role\RoleUpdated::class,
            'MVG\Listeners\Backend\Auth\Role\RoleEventListener@onUpdated'
        );

        $events->listen(
            \MVG\Events\Backend\Auth\Role\RoleDeleted::class,
            'MVG\Listeners\Backend\Auth\Role\RoleEventListener@onDeleted'
        );
    }
}
