<?php

namespace MVG\Http\Controllers\Backend\System\Gallery;

use MVG\Models\System\Gallery;
use MVG\Http\Controllers\Controller;
use MVG\Repositories\Backend\System\ImageGalleryRepository;
use MVG\Http\Requests\Backend\System\Gallery\StoreImageGalleryRequest;
use MVG\Http\Requests\Backend\System\Gallery\ManageGalleryRequest;
use MVG\Http\Requests\Backend\System\Gallery\UpdateImageGalleryRequest;

/**
 * Class ImageGalleryController.
 */
class ImageGalleryController extends Controller
{
    /**
     * @var ImageGalleryRepository
     */
    protected $galleryRepository;

    /**
     * @param ImageGalleryRepository $galleryRepository
     */
    public function __construct(ImageGalleryRepository $galleryRepository)
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
        return view('backend.system.gallery.image.create');
    }

    /**
     * @param StoreImageGalleryRequest $request
     *
     * @return mixed
     */
    public function store(StoreImageGalleryRequest $request)
    {
        $this->galleryRepository->create($request->only('image'));

        return redirect()->route('admin.system.gallery.index')->withFlashSuccess(__('alerts.backend.images.created'));
    }

    /**
     * @param Gallery              $gallery
     * @param ManageGalleryRequest $request
     *
     * @return mixed
     */
    public function edit(Gallery $gallery, ManageGalleryRequest $request)
    {
        return view('backend.system.gallery.image.edit')
            ->withGallery($gallery);
    }

    /**
     * @param Gallery              $gallery
     * @param UpdateImageGalleryRequest $request
     *
     * @return mixed
     */
    public function update(Gallery $gallery, UpdateImageGalleryRequest $request)
    {
        $this->galleryRepository->update($gallery->id, $request->only('image'));

        return redirect()->route('admin.system.gallery.index')->withFlashSuccess(__('alerts.backend.images.updated'));
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

        return redirect()->route('admin.system.gallery.index')->withFlashSuccess(__('alerts.backend.images.deleted'));
    }
}