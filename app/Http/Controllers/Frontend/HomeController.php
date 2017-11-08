<?php

namespace MVG\Http\Controllers\Frontend;

use MVG\Http\Controllers\Controller;
use MVG\Repositories\Frontend\Catalog\ProductRepository;
use MVG\Repositories\Frontend\Catalog\CategoryRepository;
use MVG\Repositories\Frontend\System\DepositionRepository;
use MVG\Repositories\Frontend\System\GalleryRepository;
use MVG\Http\Requests\Frontend\Search\SearchRequest;

/**
 * Class HomeController.
 */
class HomeController extends Controller
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
        $categoryRepository = $this->categoryRepository;

        $products = collect([
            $categoryRepository->getCategoryRandomProduct(2, 1),
            $categoryRepository->getCategoryRandomProduct(3, 1),
            $categoryRepository->getCategoryRandomProduct(4, 1),
            $categoryRepository->getCategoryRandomProduct(5, 1),
            $categoryRepository->getCategoryRandomProduct(6, 1),
            $categoryRepository->getCategoryRandomProduct(7, 1)
        ]);

        $this->seo()->setTitle('Início');
        $this->seo()->setDescription('Indio Gigante');
        $this->seo()->setCanonical(route('frontend.index'));
        $this->seo()->metatags()->addKeyword(['indio gigante', 'gigante', 'galo', 'galo gigante', 'galinha', 'galinha gigante', 'chideroli', 'criatorio', 'criatório', 'criatório chideroli', 'criatorio chideroli', 'pintinho', 'galos', 'galinhas', 'galos gigante', 'galinhas gigante', 'aves', 'aves gigante']);
        $this->seo()->opengraph()->setUrl(route('frontend.index'));
        $this->seo()->opengraph()->addProperty('type', 'website');
        $this->seo()->opengraph()->addProperty('locale', 'pt-br');
        $this->seo()->opengraph()->addImage(asset('img/logo.png'));

        return view('frontend.index')
            ->withReprodutores($categoryRepository->getCategoryRandomProduct(2, 1))
            ->withMatrizes($categoryRepository->getCategoryRandomProduct(3, 1))
            ->withFrangos($categoryRepository->getCategoryRandomProduct(4, 1))
            ->withFrangas($categoryRepository->getCategoryRandomProduct(5, 1))
            ->withPintinhos($categoryRepository->getCategoryRandomProduct(6, 1))
            ->withOvos($categoryRepository->getCategoryRandomProduct(7, 1))
            ->withProducts($products)
            ->withFeatured($this->productRepository->getFeatured())
            ->withMadeHistory($this->productRepository->getMadeHistory())
            ->withDepositions($this->depositionRepository->getPaginated());
    }

    /**
     * @param SearchRequest $request
     * @return mixed
     */
    public function search(SearchRequest $request)
    {
        $this->seo()->setTitle('Pesquisa');
        $this->seo()->setDescription('Indio Gigante');
        $this->seo()->setCanonical(route('frontend.search'));
        $this->seo()->metatags()->addKeyword(['indio gigante', 'gigante', 'galo', 'galo gigante', 'galinha', 'galinha gigante', 'chideroli', 'criatorio', 'criatório', 'criatório chideroli', 'criatorio chideroli', 'pintinho', 'galos', 'galinhas', 'galos gigante', 'galinhas gigante', 'aves', 'aves gigante']);
        $this->seo()->opengraph()->setUrl(route('frontend.index'));
        $this->seo()->opengraph()->addProperty('type', 'website');
        $this->seo()->opengraph()->addProperty('locale', 'pt-br');
        $this->seo()->opengraph()->addImage(asset('img/logo.png'));

        return view('frontend.search')
            ->withKeyword($request->input('pesquisa'))
            ->withProducts($this->productRepository->getSearchPaginated(2));
    }


    public function gallery()
    {
        $this->seo()->setTitle('Galeria');
        $this->seo()->setDescription('Indio Gigante');
        $this->seo()->setCanonical(route('frontend.gallery'));
        $this->seo()->metatags()->addKeyword(['indio gigante', 'gigante', 'galo', 'galo gigante', 'galinha', 'galinha gigante', 'chideroli', 'criatorio', 'criatório', 'criatório chideroli', 'criatorio chideroli', 'pintinho', 'galos', 'galinhas', 'galos gigante', 'galinhas gigante', 'aves', 'aves gigante']);
        $this->seo()->opengraph()->setUrl(route('frontend.gallery'));
        $this->seo()->opengraph()->addProperty('type', 'website');
        $this->seo()->opengraph()->addProperty('locale', 'pt-br');
        $this->seo()->opengraph()->addImage(asset('img/logo.png'));

        return view('frontend.gallery')
            ->withGalleries($this->galleryRepository->getAll());
    }
}
