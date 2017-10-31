<?php
namespace MVG\Listeners\Backend\Catalog\Product;
/**
 * Class ProductEventListener.
 */
class ProductEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Product Created');
    }
    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Product Updated');
    }
    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Product Deleted');
    }
    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info('Product Restored');
    }
    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info('Product PermanentlyDeleted');
    }
    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        \Log::info('Product Deactivated');
    }
    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        \Log::info('Product Reactivated');
    }
    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \MVG\Events\Backend\Catalog\Product\ProductCreated::class,
            'MVG\Listeners\Backend\Catalog\Product\ProductEventListener@onCreated'
        );
        $events->listen(
            \MVG\Events\Backend\Catalog\Product\ProductUpdated::class,
            'MVG\Listeners\Backend\Catalog\Product\ProductEventListener@onUpdated'
        );
        $events->listen(
            \MVG\Events\Backend\Catalog\Product\ProductDeleted::class,
            'MVG\Listeners\Backend\Catalog\Product\ProductEventListener@onDeleted'
        );
        $events->listen(
            \MVG\Events\Backend\Catalog\Product\ProductRestored::class,
            'MVG\Listeners\Backend\Catalog\Product\ProductEventListener@onRestored'
        );
        $events->listen(
            \MVG\Events\Backend\Catalog\Product\ProductPermanentlyDeleted::class,
            'MVG\Listeners\Backend\Catalog\Product\ProductEventListener@onPermanentlyDeleted'
        );
        $events->listen(
            \MVG\Events\Backend\Catalog\Product\ProductDeactivated::class,
            'MVG\Listeners\Backend\Catalog\Product\ProductEventListener@onDeactivated'
        );
        $events->listen(
            \MVG\Events\Backend\Catalog\Product\ProductReactivated::class,
            'MVG\Listeners\Backend\Catalog\Product\ProductEventListener@onReactivated'
        );
    }
}