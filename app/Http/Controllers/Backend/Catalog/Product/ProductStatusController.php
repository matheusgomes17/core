<?php

namespace MVG\Http\Controllers\Backend\Catalog\Product;

use MVG\Http\Requests\Backend\Catalog\Product\ManageProductRequest;
use MVG\Models\Catalog\Product;
use MVG\Http\Controllers\Controller;
use MVG\Repositories\Backend\Catalog\ProductRepository;

/**
 * Class ProductStatusController.
 */
class ProductStatusController extends Controller
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
     * @return mixed
     */
    public function getDeactivated(ManageProductRequest $request)
    {
        return view('backend.catalog.product.deactivated', compact('products'))
            ->withProducts($this->productRepository->getInactivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageProductRequest $request)
    {
        return view('backend.catalog.product.deleted')
            ->withProducts($this->productRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param Product $product
     * @param $status
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function mark(Product $product, $status, ManageProductRequest $request)
    {
        $this->productRepository->mark($product, $status);

        return redirect()->route($status == 1 ? 'admin.catalog.product.index' : 'admin.catalog.product.deactivated')->withFlashSuccess(__('alerts.backend.products.updated'));
    }

    /**
     * @param Product $deletedProduct
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function delete(Product $deletedProduct, ManageProductRequest $request)
    {
        $this->productRepository->forceDelete($deletedProduct);

        return redirect()->route('admin.catalog.product.deleted')->withFlashSuccess(__('alerts.backend.products.deleted_permanently'));
    }

    /**
     * @param Product $deletedProduct
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function restore(Product $deletedProduct, ManageProductRequest $request)
    {
        $this->productRepository->restore($deletedProduct);

        return redirect()->route('admin.catalog.product.index')->withFlashSuccess(__('alerts.backend.products.restored'));
    }
}