<?php

namespace App\Http\Controllers;

use App\Actions\Tags\DeleteTagAction;
use App\Actions\Tags\FetchTagAction;
use App\Actions\Tags\GetPaginatedTagsAction;
use App\Actions\Tags\StoreTagAction;
use App\Actions\Tags\UpdateTagAction;
use App\Http\Requests\TagRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TagsController extends Controller
{
    protected $getPaginatedTagsAction;
    protected $storeTagAction;
    protected $fetchTagAction;
    protected $updateTagAction;
    protected $deleteTagAction;

    public function __construct(GetPaginatedTagsAction $getPaginatedTagsAction,
                                StoreTagAction $storeTagAction,
                                FetchTagAction $fetchTagAction,
                                UpdateTagAction $updateTagAction,
                                DeleteTagAction $deleteTagAction)
    {
        $this->getPaginatedTagsAction = $getPaginatedTagsAction;
        $this->storeTagAction = $storeTagAction;
        $this->fetchTagAction = $fetchTagAction;
        $this->updateTagAction = $updateTagAction;
        $this->deleteTagAction = $deleteTagAction;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $tags = $this->getPaginatedTagsAction->run($request);

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(TagRequest $request)
    {

        $this->storeTagAction->run($request->all());

        return redirect('admin/tags')->with('flash_message', 'Tag added!');
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
        $tag = $this->fetchTagAction->run($id);

        return view('admin.tags.show', compact('tag'));
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
        $tag = $this->fetchTagAction->run($id);

        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return RedirectResponse|Redirector
     */
    public function update(TagRequest $request, $id)
    {
        $this->updateTagAction->run($request->all(), $id);

        return redirect('admin/tags')->with('flash_message', 'Tag updated!');
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
        $this->deleteTagAction->run($id);

        return redirect('admin/tags')->with('flash_message', 'Tag deleted!');
    }
}
