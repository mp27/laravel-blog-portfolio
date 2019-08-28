<?php

namespace App\Http\Controllers;

use App\Actions\Posts\GetAllPublicPostsAction;
use Illuminate\Http\Request;

class PublicPostsController extends Controller
{
    public function index(GetAllPublicPostsAction $getAllPostsAction, Request $request)
    {
        return view('blog.posts')->with([
            "posts" => $getAllPostsAction->run($request),
        ]);
    }
}
