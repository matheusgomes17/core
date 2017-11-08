<?php

namespace MVG\Repositories\Frontend\System;

use MVG\Models\System\Gallery;
use MVG\Repositories\BaseEloquentRepository;
use MVG\Repositories\Traits\CacheResults;

/**
 * Class GalleryRepository.
 */
class GalleryRepository extends BaseEloquentRepository
{
    use CacheResults;

    /**
     * @var array
     */
    protected $relationships = [];

    /**
     * @var string
     */
    protected $model = Gallery::class;


    /**
     * Get all items.
     *
     * @param  string $columns specific columns to select
     * @param  string $orderBy column to sort by
     * @param  string $sort sort direction
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll($columns = null, $orderBy = 'created_at', $sort = 'DESC')
    {
        return $this->model
                ->with($this->requiredRelationships)
                ->orderBy($orderBy, $sort)
                ->get($columns);
    }
}