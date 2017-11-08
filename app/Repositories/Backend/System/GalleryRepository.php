<?php

namespace MVG\Repositories\Backend\System;

use MVG\Events\Backend\System\Gallery\GalleryCreated;
use MVG\Events\Backend\System\Gallery\GalleryPermanentlyDeleted;
use MVG\Events\Backend\System\Gallery\GalleryUpdated;
use MVG\Events\Backend\System\Gallery\GalleryDeleted;
use MVG\Models\System\Gallery;
use MVG\Repositories\Backend\ImageRepository;
use MVG\Repositories\BaseEloquentRepository;
use MVG\Repositories\Traits\CacheResults;
use MVG\Exceptions\GeneralException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

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
     * @param array $data
     *
     * @return Gallery
     */
    public function create(array $data): Gallery
    {
        return DB::transaction(function () use ($data) {

            $image_gallery = $this->model->create([]);

            if ($image_gallery) {

                if (request()->hasFile('image')) {
                    $image = new ImageRepository();
                    $file = request()->file('image');
                    $image_gallery->image = $image->saveImage($file, 'image_gallery', 120);
                    $image_gallery->save();
                }

                event(new GalleryCreated($image_gallery));

                return $image_gallery;
            }

            throw new GeneralException(__('exceptions.backend.system.images.create_error'));
        });
    }

    /**
     * @param mixed $id
     * @param array $data
     *
     * @return Gallery
     */
    public function update($id, array $data) : Gallery
    {
        $image_gallery = Gallery::findOrFail($id);

        return DB::transaction(function () use ($image_gallery, $data) {

            if ($image_gallery->update([])) {

                if (request()->hasFile('image')) {
                    $image = new ImageRepository();
                    $file = request()->file('image');
                    unlink(public_path($image_gallery->image));
                    $image_gallery->image = $image->saveImage($file, 'image_gallery', 120);
                    $image_gallery->save();
                }

                event(new GalleryUpdated($image_gallery));

                return $image_gallery;
            }

            throw new GeneralException(__('exceptions.backend.system.images.update_error'));
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
        $image_gallery = Gallery::findOrFail($id);

        return DB::transaction(function () use ($image_gallery) {
            if ($image_gallery->delete()) {

                event(new GalleryDeleted($image_gallery));

                return $image_gallery;
            }

            throw new GeneralException(trans('exceptions.backend.system.images.delete_error'));
        });
    }

    /**
     * @param $id
     *
     * @return Gallery
     * @throws GeneralException
     */
    public function forceDelete($id) : Gallery
    {
        $image_gallery = Gallery::findOrFail($id);

        if (is_null($image_gallery->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.system.images.delete_first'));
        }

        return DB::transaction(function () use ($image_gallery) {
            if ($image_gallery->forceDelete()) {

                event(new GalleryPermanentlyDeleted($image_gallery));

                return $image_gallery;
            }

            throw new GeneralException(__('exceptions.backend.system.images.delete_error'));
        });
    }
}