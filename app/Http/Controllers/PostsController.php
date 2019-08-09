<?php

namespace App\Http\Controllers;

use App\Actions\Posts\DeletePostAction;
use App\Actions\Posts\FetchPostAction;
use App\Actions\Posts\GetAllPostsAction;
use App\Actions\Posts\StorePostAction;
use App\Actions\Posts\UpdatePostAction;
use App\Category;
use App\Http\Requests\StorePostRequest;
use App\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class PostsController extends Controller
{
    protected $getAllPostsAction;
    protected $storePostAction;
    protected $fetchPostAction;
    protected $updatePostAction;
    protected $deletePostAction;

    public function __construct(GetAllPostsAction $getAllPostsAction,
                                StorePostAction $storePostAction,
                                FetchPostAction $fetchPostAction,
                                UpdatePostAction $updatePostAction,
                                DeletePostAction $deletePostAction)
    {
        $this->getAllPostsAction = $getAllPostsAction;
        $this->storePostAction = $storePostAction;
        $this->fetchPostAction = $fetchPostAction;
        $this->updatePostAction = $updatePostAction;
        $this->deletePostAction = $deletePostAction;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $posts = $this->getAllPostsAction->run($request);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create')->with([
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(StorePostRequest $request)
    {
        $this->storePostAction->run($request);

        return redirect('admin/posts')->with('flash_message', 'Post added!');
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
        $post = $this->fetchPostAction->run($id);

        return view('admin.posts.show', compact('post'));
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
        $post = $this->fetchPostAction->run($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post'))->with([
            "categories" => $categories,
            "tags" => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return RedirectResponse|Redirector
     */
    public function update(StorePostRequest $request, $id)
    {
        $this->updatePostAction->run($request, $id);

        return redirect('admin/posts')->with('flash_message', 'Post updated!');
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
        $this->deletePostAction->run($id);

        return redirect('admin/posts')->with('flash_message', 'Post deleted!');
    }
}
