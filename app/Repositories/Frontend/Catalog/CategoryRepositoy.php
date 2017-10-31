<?php

namespace MVG\Repositories\Frontend\Catalog;

use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Matriphe\Imageupload\Imageupload;
use MVG\Events\Backend\Catalog\Category\CategoryCreated;
use MVG\Exceptions\GeneralException;
use MVG\Models\Catalog\Category;
use MVG\Repositories\BaseEloquentRepository;
use MVG\Repositories\Traits\CacheResults;
use Kalnoy\Nestedset\Collection;

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseEloquentRepository
{
    use CacheResults;

    /**
     * @var array
     */
    protected $relationships = ['products', 'allproducts'];

    /**
     * @var string
     */
    protected $model = Category::class;

    /**
     * Get paged items.
     *
     * @param  int $paged Items per page
     * @param  string $orderBy Column to sort by
     * @param  string $sort Sort direction
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($paged = 15, $orderBy = 'created_at', $sort = 'DESC')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * Get instance of model by column.
     *
     * @param  mixed $term search term
     * @param int $paged
     * @param  string $column column to search
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCollectionByColumn($term, $paged = 15, $column = 'slug')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->where($column, '=', $term)
            ->first();
    }

    /**
     * @param $id
     * @param int $paged
     * @return mixed
     */
    public function getCategoryRandomProduct($id, $paged = 5)
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->find($id)
            ->products
            ->random($paged);
    }

    /**
     * Get item by its id.
     *
     * @param  int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById($id)
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->find($id);
    }
}