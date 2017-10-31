<?php

namespace MVG\Listeners\Backend\Auth\User;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('User Created');
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        \Log::info('User Confirmed');
    }

    /**
     * @param $event
     */
    public function onUnconfirmed($event)
    {
        \Log::info('User Unconfirmed');
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        \Log::info('User Password Changed');
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        \Log::info('User Deactivated');
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        \Log::info('User Reactivated');
    }

    /**
     * @param $event
     */
    public function onSocialDeleted($event)
    {
        \Log::info('User Reactivated');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info('User Permanently Deleted');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info('User Restored');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \MVG\Events\Backend\Auth\User\UserCreated::class,
            'MVG\Listeners\Backend\Auth\User\UserEventListener@onCreated'
        );

        $events->listen(
            \MVG\Events\Backend\Auth\User\UserConfirmed::class,
            'MVG\Listeners\Backend\Auth\User\UserEventListener@onConfirmed'
        );

        $events->listen(
            \MVG\Events\Backend\Auth\User\UserUnconfirmed::class,
            'MVG\Listeners\Backend\Auth\User\UserEventListener@onUnconfirmed'
        );

        $events->listen(
            \MVG\Events\Backend\Auth\User\UserPasswordChanged::class,
            'MVG\Listeners\Backend\Auth\User\UserEventListener@onPasswordChanged'
        );

        $events->listen(
            \MVG\Events\Backend\Auth\User\UserDeactivated::class,
            'MVG\Listeners\Backend\Auth\User\UserEventListener@onDeactivated'
        );

        $events->listen(
            \MVG\Events\Backend\Auth\User\UserReactivated::class,
            'MVG\Listeners\Backend\Auth\User\UserEventListener@onReactivated'
        );

        $events->listen(
            \MVG\Events\Backend\Auth\User\UserSocialDeleted::class,
            'MVG\Listeners\Backend\Auth\User\UserEventListener@onSocialDeleted'
        );

        $events->listen(
            \MVG\Events\Backend\Auth\User\UserPermanentlyDeleted::class,
            'MVG\Listeners\Backend\Auth\User\UserEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \MVG\Events\Backend\Auth\User\UserRestored::class,
            'MVG\Listeners\Backend\Auth\User\UserEventListener@onRestored'
        );
    }
}
