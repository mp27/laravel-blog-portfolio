<?php

namespace App\Http\Controllers;

use App\Actions\Posts\GetAllPublicPostsAction;
use App\Actions\Posts\GetPublicPostBySlug;
use App\Actions\Posts\GetPublicSimilarPosts;
use Illuminate\Http\Request;

class PublicPostsController extends Controller
{
    public function index(GetAllPublicPostsAction $getAllPostsAction, Request $request)
    {
        return view('blog.posts')->with([
            "posts" => $getAllPostsAction->run($request),
        ]);
    }

    public function show($postSlug, GetPublicPostBySlug $getPublicPostBySlug, GetPublicSimilarPosts $getPublicSimilarPosts)
    {
        $post = $getPublicPostBySlug->run($postSlug);

        return view('blog.post')->with([
            'post' => $post,
            'similarPosts' => $getPublicSimilarPosts->run($post)
        ]);
    }
}
