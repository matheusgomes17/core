<?php

return [
    /*
     * Products table used to store products
     */
    'products_table' => 'products',
    /*
     * Product model used by Catalog to create correct relations.
     * Update the product if it is in a different namespace.
    */
    'product' => MVG\Models\Catalog\Product::class,
    /*
     * Categories table used to store categories
     */
    'categories_table' => 'categories',
    /*
     * Category model used by Catalog to create correct relations.
     * Update the category if it is in a different namespace.
    */
    'category' => MVG\Models\Catalog\Category::class,
];