<?php

namespace App\Http\Controllers;

use App\Actions\Categories\DeleteCategoryAction;
use App\Actions\Categories\FetchCategoryAction;
use App\Actions\Categories\GetPaginatedCategoriesAction;
use App\Actions\Categories\StoreCategoryAction;
use App\Actions\Categories\UpdateCategoryAction;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    protected $getPaginatedCategoriesAction;
    protected $storeCategoryAction;
    protected $fetchCategoryAction;
    protected $updateCategoryAction;
    protected $deleteCategoryAction;

    public function __construct(GetPaginatedCategoriesAction $getPaginatedCategoriesAction,
                                StoreCategoryAction $storeCategoryAction,
                                FetchCategoryAction $fetchCategoryAction,
                                UpdateCategoryAction $updateCategoryAction,
                                DeleteCategoryAction $deleteCategoryAction)
    {
        $this->getPaginatedCategoriesAction = $getPaginatedCategoriesAction;
        $this->storeCategoryAction = $storeCategoryAction;
        $this->fetchCategoryAction = $fetchCategoryAction;
        $this->updateCategoryAction = $updateCategoryAction;
        $this->deleteCategoryAction = $deleteCategoryAction;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $categories = $this->getPaginatedCategoriesAction->run($request);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(CategoryRequest $request)
    {
        $this->storeCategoryAction->run($request->all());

        return redirect('admin/categories')->with('flash_message', 'Category added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function show($id)
    {
        $category = $this->fetchCategoryAction->run($id);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit($id)
    {
        $category = $this->fetchCategoryAction->run($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return RedirectResponse|Redirector
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->updateCategoryAction->run($request->all(), $id);

        return redirect('admin/categories')->with('flash_message', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->deleteCategoryAction->run($id);

        return redirect('admin/categories')->with('flash_message', 'Category deleted!');
    }
}
