<?php

namespace MVG\Repositories\Backend\System;

use MVG\Events\Backend\System\Deposition\DepositionCreated;
use MVG\Events\Backend\System\Deposition\DepositionUpdated;
use MVG\Events\Backend\System\Deposition\DepositionDeleted;
use MVG\Models\System\Deposition;
use MVG\Repositories\BaseEloquentRepository;
use MVG\Repositories\Traits\CacheResults;
use MVG\Repositories\Traits\ImageManager;
use MVG\Exceptions\GeneralException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * Class DepositionRepository.
 */
class DepositionRepository extends BaseEloquentRepository
{
    use CacheResults,
        ImageManager;

    /**
     * @var array
     */
    protected $relationships = ['users'];

    /**
     * @var string
     */
    protected $model = Deposition::class;

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
     * @return Deposition
     */
    public function create(array $data): Deposition
    {
        return DB::transaction(function () use ($data) {

            $deposition = $this->model->create([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'city' => $data['city'],
                'state' => $data['state'],
                'link' => $data['link']
            ]);


            if ($deposition) {
                if (request()->hasFile('cover')) {
                    $file = request()->file('cover');

                    if ($this->isAlreadyUploaded($file)) {
                        abort(400, 'Esse arquivo já foi enviado antes.');
                    }

                    $path = $file->store('uploads/depositions');
                    $deposition->cover = $path;
                    $deposition->save();
                }

                event(new DepositionCreated($deposition));

                return $deposition;
            }

            throw new GeneralException(__('exceptions.backend.system.depositions.create_error'));
        });
    }

    /**
     * @param mixed $id
     * @param array $data
     *
     * @return Deposition
     */
    public function update($id, array $data) : Deposition
    {
        $product = Deposition::findOrFail($id);

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

                event(new DepositionUpdated($product));

                return $product;
            }

            throw new GeneralException(__('exceptions.backend.system.depositions.update_error'));
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
        $product = Deposition::findOrFail($id);

        return DB::transaction(function () use ($product) {
            if ($product->delete()) {

                event(new ProductDeleted($product));

                return $product;
            }

            throw new GeneralException(trans('exceptions.backend.system.depositions.delete_error'));
        });
    }

    /**
     * @param Deposition $id
     *
     * @return Deposition
     * @throws GeneralException
     */
    public function forceDelete($id) : Deposition
    {
        $product = Deposition::findOrFail($id);

        if (is_null($product->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.system.depositions.delete_first'));
        }

        return DB::transaction(function () use ($product) {
            if ($product->forceDelete()) {

                event(new ProductPermanentlyDeleted($product));

                return $product;
            }

            throw new GeneralException(__('exceptions.backend.system.depositions.delete_error'));
        });
    }
}