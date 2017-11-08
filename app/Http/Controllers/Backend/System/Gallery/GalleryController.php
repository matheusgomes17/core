<?php

namespace MVG\Http\Controllers\Backend\System\Gallery;

use MVG\Models\System\Gallery;
use MVG\Http\Controllers\Controller;
use MVG\Repositories\Backend\System\GalleryRepository;
use MVG\Http\Requests\Backend\System\Gallery\ManageGalleryRequest;

/**
 * Class GalleryController.
 */
class GalleryController extends Controller
{
    /**
     * @var GalleryRepository
     */
    protected $galleryRepository;

    /**
     * @param GalleryRepository $galleryRepository
     */
    public function __construct(GalleryRepository $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    /**
     * @param ManageGalleryRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageGalleryRequest $request)
    {
        return view('backend.system.gallery.index')
            ->withGalleries($this->galleryRepository->getPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageGalleryRequest $request
     *
     * @return mixed
     */
    public function create(ManageGalleryRequest $request)
    {
        return view('backend.system.gallery.create');
    }
}