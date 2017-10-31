<?php

namespace MVG\Repositories\Backend\Catalog;

use MVG\Models\Catalog\Product;
use MVG\Models\Catalog\Category;
use MVG\Events\Backend\Catalog\Product\ProductCreated;
use MVG\Events\Backend\Catalog\Product\ProductUpdated;
use MVG\Events\Backend\Catalog\Product\ProductDeleted;
use MVG\Events\Backend\Catalog\Product\ProductPermanentlyDeleted;
use MVG\Repositories\BaseEloquentRepository;
use MVG\Repositories\Traits\CacheResults;
use MVG\Repositories\Traits\ImageManager;
use MVG\Exceptions\GeneralException;
use Kalnoy\Nestedset\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseEloquentRepository
{
    use CacheResults,
        ImageManager;

    /**
     * @var array
     */
    protected $relationships = ['categories', 'model'];

    /**
     * @var string
     */
    protected $model = Product::class;

    /**
     * @param $except
     * @return Category
     */
    public function getCategoryOptions($except = null)
    {
        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = Category::select('id', 'name')->withDepth();

        if ($except) {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }

    /**
     * @param Collection $items
     * @return static
     */
    protected function makeOptions(Collection $items)
    {
        $options = ['' => trans('exceptions.backend.catalog.products.category_info')];

        if ($items->count() > 0) {
            foreach ($items as $item) {
                if ($item['depth'] != 0) {
                    unset($options['']);
                    $options[$item->getKey()] = str_repeat('-', $item->depth) . ' ' . $item->name;
                }
            }
        }

        return $options;
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
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getInactivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->active(false)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @return Product
     */
    public function create(array $data): Product
    {
        return DB::transaction(function () use ($data) {

            $product = $this->model->create([
                'user_id' => auth()->user()->id,
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'slug' => str_slug($data['name']),
                'height' => $data['height'],
                'membership' => $data['membership'],
                'description' => $data['description'],
                'sold' => isset($data['sold']) ? true : false,
                'featured' => isset($data['featured']) ? true : false,
                'made_history' => isset($data['made_history']) ? true : false,
                'active' => isset($data['active']) ? 1 : 0
            ]);

            if (is_null($product->category_id)) {
                throw new GeneralException(__('exceptions.backend.catalog.products.category_error'));
            }

            $product->category_main_id = $product->categories->parent->id;
            $product->save();

            if ($product) {

                if (request()->hasFile('cover')) {
                    $file = request()->file('cover');

                    if ($this->isAlreadyUploaded($file)) {
                        abort(400, 'Esse arquivo já foi enviado antes.');
                    }

                    $path = $file->store('uploads/products');
                    $product->cover = $path;
                    $product->save();

                }

                event(new ProductCreated($product));

                return $product;
            }

            throw new GeneralException(__('exceptions.backend.catalog.products.create_error'));
        });
    }

    /**
     * @param mixed $id
     * @param array $data
     *
     * @return Product
     */
    public function update($id, array $data) : Product
    {
        $product = Product::findOrFail($id);

        return DB::transaction(function () use ($product, $data) {

            if ($product->update([
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'height' => $data['height'],
                'membership' => $data['membership'],
                'description' => $data['description'],
                'sold' => isset($data['sold']) ? true : false,
                'status' => isset($data['status']) ? 1 : 0,
            ])) {

                if (isset($data['cover'])) {
                    foreach ($product->getImageType() as $value) {
                        unlink($product->getImagePath($value));
                    }

                    $product->image->delete();
                    $cover = new AttacherModel();
                    $cover->setupFile($data['cover']);
                    $cover->subject_id = $product->id;
                    $cover->subject_type = $this->model;
                    $cover->file_name = str_random(56) . '.' . $cover->file_extension;
                    $cover->save();
                }

                event(new ProductUpdated($product));

                return $product;
            }

            throw new GeneralException(__('exceptions.backend.catalog.products.update_error'));
        });
    }

    /**
     * @param $id
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete($id)
    {
        $product = Product::findOrFail($id);

        return DB::transaction(function () use ($product) {
            if ($product->delete()) {

                event(new ProductDeleted($product));

                return $product;
            }

            throw new GeneralException(trans('exceptions.backend.catalog.products.delete_error'));
        });
    }

    /**
     * @param Product $user
     *
     * @return Product
     * @throws GeneralException
     */
    public function forceDelete($id) : Product
    {
        $product = Product::findOrFail($id);

        if (is_null($product->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.catalog.products.delete_first'));
        }

        return DB::transaction(function () use ($product) {
            if ($product->forceDelete()) {

                event(new ProductPermanentlyDeleted($product));

                return $product;
            }

            throw new GeneralException(__('exceptions.backend.catalog.products.delete_error'));
        });
    }
}