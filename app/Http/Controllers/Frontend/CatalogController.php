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


        $this->seo()->setTitle($category->name);
        $this->seo()->setDescription(strip_tags($category->description));
        $this->seo()->setCanonical(route('frontend.category', $category->slug));
        $this->seo()->opengraph()->setUrl(route('frontend.category', $category->slug));
        $this->seo()->opengraph()->addProperty('type', 'website');
        $this->seo()->opengraph()->addProperty('locale', 'pt-br');

        return view('frontend.category')
            ->withCategory($category)
            ->withProducts($products);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function product($slug)
    {
        $product = $this->productRepository->getCollectionByColumn($slug);

        $this->seo()->setTitle($product->name);
        $this->seo()->setDescription(strip_tags($product->description));
        $this->seo()->setCanonical(route('frontend.product', $product->slug));
        $this->seo()->opengraph()->setUrl(route('frontend.product', $product->slug));
        $this->seo()->opengraph()->addProperty('type', 'website');
        $this->seo()->opengraph()->addProperty('locale', 'pt-br');
        $this->seo()->opengraph()->addImage(asset($product->cover));

        return view('frontend.product')
            ->withRelated($this->productRepository->getRelated($slug, 4))
            ->withProduct($product);
    }
}
