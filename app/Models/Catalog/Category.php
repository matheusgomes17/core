<?php

namespace MVG\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Kalnoy\Nestedset\NodeTrait;
use MVG\Models\Catalog\Traits\Relationship\CategoryRelationship;
use MVG\Models\Traits\Sluggable;
use MVG\Models\Traits\Uuid;

/**
 * Class Category.
 */
class Category extends Model
{
    use Notifiable,
        SoftDeletes,
        CategoryRelationship,
        Uuid,
        Sluggable,
        NodeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'slug', 'description'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

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