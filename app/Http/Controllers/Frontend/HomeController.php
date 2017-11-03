<?php

namespace MVG\Http\Controllers\Frontend;

use MVG\Http\Controllers\Controller;
use MVG\Repositories\Frontend\Catalog\ProductRepository;
use MVG\Repositories\Frontend\Catalog\CategoryRepository;
use MVG\Repositories\Frontend\System\DepositionRepository;
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

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        DepositionRepository $depositionRepository
    ){
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->depositionRepository = $depositionRepository;
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
        return view('frontend.search')
            ->withKeyword($request->input('pesquisa'))
            ->withProducts($this->productRepository->getSearchPaginated(2));
    }


    public function gallery()
    {
        return view('frontend.gallery')
            ->withProducts($this->productRepository->getSearchPaginated(2));
    }
}
