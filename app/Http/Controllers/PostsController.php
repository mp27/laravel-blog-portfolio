<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
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
            $posts = Post::latest()->with('category')->paginate($perPage);
        } else {
            $posts = Post::latest()->with('category')->paginate($perPage);
        }

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
        $requestData = $request->all();

        if ($request->hasFile('thumbnail')) {
            $title = Str::slug($requestData['title'], '-');
            $requestData['thumbnail'] = $this->createThumbnail($request->file('thumbnail'), $title);
        }

        $post = Post::create($requestData);
        $post->tags()->sync($request->tags);

        return redirect('admin/posts')->with('flash_message', 'Post added!');
    }

    public function createThumbnail($file, $title)
    {
        $fileName = "thumbnails/{$title}.{$file->getClientOriginalExtension()}";

        Image::make($file)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($fileName);

        return $fileName;
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
        $post = Post::findOrFail($id);

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
        $post = Post::findOrFail($id);
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
        $requestData = $request->all();
        $requestData['published'] = false;

        if ($request->published) {
            $requestData['published'] = true;
        }

        if ($request->hasFile('thumbnail')) {
            $title = Str::slug($requestData['title'], '-');
            $requestData['thumbnail'] = $this->createThumbnail($request->file('thumbnail'), $title);
        }

        $post = Post::findOrFail($id);
        $post->update($requestData);
        $post->tags()->sync($request->tags);

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
        Post::destroy($id);

        return redirect('admin/posts')->with('flash_message', 'Post deleted!');
    }
}
