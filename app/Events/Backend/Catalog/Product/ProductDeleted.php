<?php

namespace MVG\Events\Backend\Catalog\Product;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProductDeleted.
 */
class ProductDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $product;

    /**
     * @param $product
     */
    public function __construct($product)
    {
        $this->product = $product;
    }
}