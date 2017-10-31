<?php

namespace MVG\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use MVG\Models\Traits\SearchableTrait;
use MVG\Models\Traits\Sluggable;
use MVG\Models\Traits\Uuid;
use MVG\Models\Catalog\Traits\Scope\ProductScope;
use MVG\Models\Catalog\Traits\Attribute\ProductAttribute;
use MVG\Models\Catalog\Traits\Relationship\ProductRelationship;

/**
 * Class Product.
 */
class Product extends Model
{
    use ProductScope,
        Notifiable,
        SoftDeletes,
        ProductAttribute,
        SearchableTrait,
        Uuid,
        Sluggable,
        ProductRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'category_main_id',
        'name',
        'slug',
        'cover',
        'height',
        'membership',
        'description',
        'sold',
        'featured',
        'made_history',
        'status'
    ];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'products.name' => 10,
        ]
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}