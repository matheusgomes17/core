<?php

namespace MVG\Repositories\Backend\Catalog;

use Illuminate\Support\Facades\DB;
use MVG\Events\Backend\Catalog\Category\CategoryCreated;
use MVG\Events\Backend\Catalog\Category\CategoryDeleted;
use MVG\Events\Backend\Catalog\Category\CategoryUpdated;
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
    protected $relationships = ['products'];

    /**
     * @var string
     */
    protected $model = Category::class;

    /**
     * @param  $except
     * @return Category
     */
    public function getCategoryOptions($except = null)
    {
        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = $this->model->select('id', 'name')->withDepth();

        if ($except) {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }

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
     * @param Collection $items
     * @return static
     */
    protected function makeOptions(Collection $items)
    {
        $options = ['' => trans('exceptions.backend.catalog.categories.main')];

        foreach ($items as $item) {
            $options[$item->getKey()] = str_repeat('-', $item->depth + 1) . ' ' . $item->name;
        }

        return $options;
    }

    /**
     * @param array $data
     * @return Category
     */
    public function create(array $data) : Category
    {
        return DB::transaction(function () use ($data) {

            $category = $this->model->create([
                'name' => $data['name'],
                'description' => $data['description'],
                'parent_id' => $data['parent_id'],
            ]);

            if ($category) {

                event(new CategoryCreated($category));

                return $category;
            }

            throw new GeneralException(__('exceptions.backend.catalog.categories.create_error'));
        });
    }

    /**
     * @param mixed $id
     * @param array $data
     * @return Category
     */
    public function update($id, array $data) : Category
    {
        $category = Category::findOrFail($id);

        return DB::transaction(function () use ($category, $data) {
            if ($category->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'parent_id' => $data['parent_id'],
            ])) {
                event(new CategoryUpdated($category));

                return $category;
            }

            throw new GeneralException(__('exceptions.backend.catalog.categories.update_error'));
        });
    }

    /**
     * @param $id
     * @return Category
     * @throws GeneralException
     */
    public function delete($id) : Category
    {
        $category = Category::findOrFail($id);

        return DB::transaction(function () use ($category) {
            if ($category->delete()) {

                event(new CategoryDeleted($category));

                return $category;
            }

            throw new GeneralException(__('exceptions.backend.catalog.categories.delete_error'));
        });
    }
}