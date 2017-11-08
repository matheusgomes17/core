<?php

namespace MVG\Http\Controllers\Backend\Catalog\Product;

use MVG\Models\Catalog\Product;
use MVG\Http\Controllers\Controller;
use MVG\Repositories\Backend\Catalog\ProductRepository;
use MVG\Http\Requests\Backend\Catalog\Product\StoreProductRequest;
use MVG\Http\Requests\Backend\Catalog\Product\ManageProductRequest;
use MVG\Http\Requests\Backend\Catalog\Product\UpdateProductRequest;

/**
 * Class ProductController.
 */
class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageProductRequest $request)
    {
        return view('backend.catalog.product.index')
            ->withProducts($this->productRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function create(ManageProductRequest $request)
    {
        return view('backend.catalog.product.create')
            ->withCategories($this->productRepository->getCategoryOptions());
    }

    /**
     * @param StoreProductRequest $request
     *
     * @return mixed
     */
    public function store(StoreProductRequest $request)
    {
        $this->productRepository->create($request->only(
            'user_id',
            'category_id',
            'category_main_id',
            'name',
            'cover',
            'height',
            'membership',
            'description',
            'sold',
            'featured',
            'made_history',
            'status'
        ));

        return redirect()->route('admin.catalog.product.index')->withFlashSuccess(__('alerts.backend.products.created'));
    }

    /**
     * @param Product              $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function edit(Product $product, ManageProductRequest $request)
    {
        return view('backend.catalog.product.edit')
            ->withProduct($product)
            ->withCategories($this->productRepository->getCategoryOptions());
    }

    /**
     * @param Product              $product
     * @param UpdateProductRequest $request
     *
     * @return mixed
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $this->productRepository->update($product->id, $request->only(
            'user_id',
            'category_id',
            'category_main_id',
            'name',
            'cover',
            'height',
            'membership',
            'description',
            'sold',
            'featured',
            'made_history',
            'status'
        ));

        return redirect()->route('admin.catalog.product.index')->withFlashSuccess(__('alerts.backend.products.updated'));
    }

    /**
     * @param Product              $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function destroy(Product $product, ManageProductRequest $request)
    {
        $this->productRepository->delete($product->id);

        return redirect()->route('admin.catalog.product.deleted')->withFlashSuccess(__('alerts.backend.products.deleted'));
    }
}