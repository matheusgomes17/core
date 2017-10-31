<?php

namespace MVG\Models\Catalog\Traits\Relationship;

/**
 * Class CategoryRelationship.
 */
trait CategoryRelationship
{
    /**
     * HasMany relations with Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(config('catalog.product'));
    }

    /**
     * HasMany relations with all Products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function allproducts()
    {
        return $this->hasMany(config('catalog.product'), 'category_main_id', 'id');
    }
}