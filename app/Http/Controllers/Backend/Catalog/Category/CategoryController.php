<?php

namespace MVG\Http\Controllers\Backend\Catalog\Category;

use MVG\Models\Catalog\Category;
use MVG\Http\Controllers\Controller;
use MVG\Repositories\Backend\Catalog\CategoryRepository;
use MVG\Http\Requests\Backend\Catalog\Category\StoreCategoryRequest;
use MVG\Http\Requests\Backend\Catalog\Category\ManageCategoryRequest;
use MVG\Http\Requests\Backend\Catalog\Category\UpdateCategoryRequest;

/**
 * Class CategoryController.
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageCategoryRequest $request)
    {
        return view('backend.catalog.category.index')
            ->withCategories($this->categoryRepository->getPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function create(ManageCategoryRequest $request)
    {
        return view('backend.catalog.category.create')
            ->withCategories($this->categoryRepository->getCategoryOptions());
    }

    /**
     * @param StoreCategoryRequest $request
     *
     * @return mixed
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepository->create($request->only(
            'name',
            'description',
            'parent_id'
        ));

        return redirect()->route('admin.catalog.category.index')->withFlashSuccess(__('alerts.backend.categories.created'));
    }

    /**
     * @param Category              $category
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function edit(Category $category, ManageCategoryRequest $request)
    {
        return view('backend.catalog.category.edit')
            ->withCategory($category)
            ->withCategories($this->categoryRepository->getCategoryOptions($category));
    }

    /**
     * @param Category              $category
     * @param UpdateCategoryRequest $request
     *
     * @return mixed
     */
    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $this->categoryRepository->update($category->id, $request->only(
            'name',
            'cover',
            'description',
            'parent_id'
        ));

        return redirect()->route('admin.catalog.category.index')->withFlashSuccess(__('alerts.backend.categories.updated'));
    }

    /**
     * @param Category              $category
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function destroy(Category $category, ManageCategoryRequest $request)
    {
        $this->categoryRepository->delete($category->id);
        
        return redirect()->route('admin.catalog.category.index')->withFlashSuccess(__('alerts.backend.categories.deleted'));
    }
}