<?php

namespace MVG\Http\Controllers\Backend\System\Gallery;

use MVG\Models\System\Gallery;
use MVG\Http\Controllers\Controller;
use MVG\Repositories\Backend\System\VideoGalleryRepository;
use MVG\Http\Requests\Backend\System\Gallery\StoreVideoGalleryRequest;
use MVG\Http\Requests\Backend\System\Gallery\ManageGalleryRequest;
use MVG\Http\Requests\Backend\System\Gallery\UpdateVideoGalleryRequest;

/**
 * Class VideoGalleryController.
 */
class VideoGalleryController extends Controller
{
    /**
     * @var VideoGalleryRepository
     */
    protected $galleryRepository;

    /**
     * @param VideoGalleryRepository $galleryRepository
     */
    public function __construct(VideoGalleryRepository $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    /**
     * @param ManageGalleryRequest $request
     *
     * @return mixed
     */
    public function create(ManageGalleryRequest $request)
    {
        return view('backend.system.gallery.video.create');
    }

    /**
     * @param StoreVideoGalleryRequest $request
     *
     * @return mixed
     */
    public function store(StoreVideoGalleryRequest $request)
    {
        $this->galleryRepository->create($request->only('video'));

        return redirect()->route('admin.system.gallery.index')->withFlashSuccess(__('alerts.backend.videos.created'));
    }

    /**
     * @param Gallery              $gallery
     * @param ManageGalleryRequest $request
     *
     * @return mixed
     */
    public function edit(Gallery $gallery, ManageGalleryRequest $request)
    {
        return view('backend.system.gallery.video.edit')
            ->withGallery($gallery);
    }

    /**
     * @param Gallery              $gallery
     * @param UpdateVideoGalleryRequest $request
     *
     * @return mixed
     */
    public function update(Gallery $gallery, UpdateVideoGalleryRequest $request)
    {
        $this->galleryRepository->update($gallery->id, $request->only('video'));

        return redirect()->route('admin.system.gallery.index')->withFlashSuccess(__('alerts.backend.videos.updated'));
    }

    /**
     * @param Gallery              $gallery
     * @param ManageGalleryRequest $request
     *
     * @return mixed
     */
    public function destroy(Gallery $gallery, ManageGalleryRequest $request)
    {
        $this->galleryRepository->delete($gallery->id);

        return redirect()->route('admin.system.gallery.index')->withFlashSuccess(__('alerts.backend.videos.deleted'));
    }
}