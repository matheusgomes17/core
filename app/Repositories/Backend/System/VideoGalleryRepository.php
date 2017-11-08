<?php

namespace MVG\Repositories\Backend\System;

use MVG\Events\Backend\System\Gallery\GalleryCreated;
use MVG\Events\Backend\System\Gallery\GalleryUpdated;
use MVG\Events\Backend\System\Gallery\GalleryDeleted;
use MVG\Models\System\Gallery;
use MVG\Repositories\BaseEloquentRepository;
use MVG\Repositories\Traits\CacheResults;
use MVG\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;

/**
 * Class VideoGalleryRepository.
 */
class VideoGalleryRepository extends BaseEloquentRepository
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

            $gallery = $this->model->create([
                'type'  => 'video',
                'video' => $data['video']
            ]);

            if ($gallery) {

                event(new GalleryCreated($gallery));

                return $gallery;
            }

            throw new GeneralException(__('exceptions.backend.system.videos.create_error'));
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

            if ($gallery->update(['video' => $data['video']])) {

                event(new GalleryUpdated($gallery));

                return $gallery;
            }

            throw new GeneralException(__('exceptions.backend.system.videos.update_error'));
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

                event(new GalleryDeleted($gallery));

                return $gallery;
            }

            throw new GeneralException(__('exceptions.backend.system.videos.delete_error'));
        });
    }
}