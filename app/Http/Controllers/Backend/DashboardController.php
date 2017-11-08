<?php

namespace MVG\Http\Controllers\Backend;

use MVG\Http\Controllers\Controller;
use MVG\Repositories\Backend\Catalog\ProductRepository;
use MVG\Repositories\Backend\Catalog\CategoryRepository;
use MVG\Repositories\Backend\System\DepositionRepository;
use MVG\Repositories\Backend\System\GalleryRepository;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var DepositionRepository
     */
    protected $depositionRepository;

    /**
     * @var GalleryRepository
     */
    protected $galleryRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(
    	ProductRepository $productRepository,
    	CategoryRepository $categoryRepository,
    	DepositionRepository $depositionRepository,
    	GalleryRepository $galleryRepository
    ){
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->depositionRepository = $depositionRepository;
        $this->galleryRepository = $galleryRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.dashboard')
        	->withProducts($this->productRepository->getAll()->count())
        	->withCategories($this->categoryRepository->getAll()->count())
        	->withDepositions($this->depositionRepository->getAll()->count())
        	->withGalleries($this->galleryRepository->getAll()->count());
    }
}
