<?php

namespace MVG\Events\Backend\Catalog\Product;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProductReactivated.
 */
class ProductReactivated
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