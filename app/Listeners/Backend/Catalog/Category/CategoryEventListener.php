<?php
namespace MVG\Listeners\Backend\Catalog\Category;
/**
 * Class CategoryEventListener.
 */
class CategoryEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Category Created');
    }
    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Category Updated');
    }
    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Category Deleted');
    }
    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \MVG\Events\Backend\Catalog\Category\CategoryCreated::class,
            'MVG\Listeners\Backend\Catalog\Category\CategoryEventListener@onCreated'
        );
        $events->listen(
            \MVG\Events\Backend\Catalog\Category\CategoryUpdated::class,
            'MVG\Listeners\Backend\Catalog\Category\CategoryEventListener@onUpdated'
        );
        $events->listen(
            \MVG\Events\Backend\Catalog\Category\CategoryDeleted::class,
            'MVG\Listeners\Backend\Catalog\Category\CategoryEventListener@onDeleted'
        );
    }
}