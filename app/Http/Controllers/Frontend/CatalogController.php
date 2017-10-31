<?php

namespace MVG\Http\Controllers\Frontend;

use MVG\Http\Controllers\Controller;
use MVG\Repositories\Frontend\Catalog\CategoryRepository;
use MVG\Repositories\Frontend\Catalog\ProductRepository;

/**
 * Class CatalogController.
 */
class CatalogController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function category($slug)
    {
        $category = $this->categoryRepository->getCollectionByColumn($slug);
        $products = (!is_null($category->parent))
            ? $category->products()->paginate(12)
            : $category->allproducts()->paginate(12);

        return view('frontend.category')
            ->withCategory($category)
            ->withProducts($products);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function product($slug)
    {
        return view('frontend.product')
            ->withRelated($this->productRepository->getCollectionByColumn($slug)->categories->products)
            ->withProduct($this->productRepository->getCollectionByColumn($slug));
    }
}
