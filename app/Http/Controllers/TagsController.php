<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $tags = Tag::latest()->paginate($perPage);
        } else {
            $tags = Tag::latest()->paginate($perPage);
        }

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

        $requestData = $request->all();

        Tag::create($requestData);

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
        $tag = Tag::findOrFail($id);

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
        $tag = Tag::findOrFail($id);

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

        $requestData = $request->all();

        $tag = Tag::findOrFail($id);
        $tag->update($requestData);

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
        Tag::destroy($id);

        return redirect('admin/tags')->with('flash_message', 'Tag deleted!');
    }
}
