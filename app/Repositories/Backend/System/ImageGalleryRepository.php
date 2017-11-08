<?php

namespace MVG\Repositories\Backend\System;

use MVG\Events\Backend\System\Gallery\GalleryCreated;
use MVG\Events\Backend\System\Gallery\GalleryUpdated;
use MVG\Events\Backend\System\Gallery\GalleryDeleted;
use MVG\Models\System\Gallery;
use MVG\Repositories\Backend\ImageRepository;
use MVG\Repositories\BaseEloquentRepository;
use MVG\Repositories\Traits\CacheResults;
use MVG\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;

/**
 * Class ImageGalleryRepository.
 */
class ImageGalleryRepository extends BaseEloquentRepository
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
     * @param array $data
     *
     * @return Gallery
     */
    public function create(array $data): Gallery
    {
        return DB::transaction(function () use ($data) {

            $gallery = $this->model->create(['type' => 'image']);

            if ($gallery) {

                if (request()->hasFile('image')) {
                    $image = new ImageRepository();
                    $file = request()->file('image');
                    $gallery->image = $image->saveImage($file, 'gallery', 120);
                    $gallery->save();
                }

                event(new GalleryCreated($gallery));

                return $gallery;
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
        $gallery = Gallery::findOrFail($id);

        return DB::transaction(function () use ($gallery, $data) {

            if ($gallery->update([])) {

                if (request()->hasFile('image')) {
                    $image = new ImageRepository();
                    $file = request()->file('image');

                    $original_image = explode('.', $gallery->image);
                    $original_filename = $original_image[0] . '_original.' . $original_image[1];
                    unlink(public_path($original_filename));
                    unlink(public_path($gallery->image));

                    $gallery->image = $image->saveImage($file, 'gallery', 120);
                    $gallery->save();
                }

                event(new GalleryUpdated($gallery));

                return $gallery;
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
        $gallery = Gallery::findOrFail($id);

        return DB::transaction(function () use ($gallery) {
            if ($gallery->delete()) {
                
                $original_image = explode('.', $gallery->image);
                $original_filename = $original_image[0] . '_original.' . $original_image[1];
                unlink(public_path($original_filename));
                unlink(public_path($gallery->image));

                event(new GalleryDeleted($gallery));

                return $gallery;
            }

            throw new GeneralException(__('exceptions.backend.system.images.delete_error'));
        });
    }
}