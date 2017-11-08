<?php

namespace MVG\Repositories\Frontend\Catalog;

use MVG\Models\Catalog\Product;
use MVG\Models\Catalog\Category;
use MVG\Repositories\BaseEloquentRepository;
use MVG\Repositories\Traits\CacheResults;
use MVG\Exceptions\GeneralException;
use Kalnoy\Nestedset\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseEloquentRepository
{
    use CacheResults;

    /**
     * @var array
     */
    protected $relationships = ['categories', 'model'];

    /**
     * @var string
     */
    protected $model = Product::class;

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
    
    public function getSearchPaginated($orderBy = 'created_at', $sort = 'DESC')
    {
        return $this->model
            ->search(request()->input('pesquisa'), null, true)
            ->where('status', '1')
            ->with($this->requiredRelationships)
            ->orderBy($orderBy, $sort)
            ->get();
    }


    public function getFeatured($orderBy = 'created_at', $sort = 'DESC')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->where('featured', '1')
            ->orderBy($orderBy, $sort)
            ->take(4)
            ->get();
    }


    public function getMadeHistory($orderBy = 'created_at', $sort = 'DESC')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->where('made_history', '1')
            ->orderBy($orderBy, $sort)
            ->take(4)
            ->get();
    }

    /**
     * Get instance of model by column.
     *
     * @param  mixed $term search term
     * @param  string $column column to search
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCollectionByColumn($term, $column = 'slug')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->where($column, '=', $term)
            ->first();
    }

    public function getRelated($term, $paged = 15, $column = 'slug')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->where($column, '<>', $term)
            ->get()
            ->random($paged);
    }
}