<?php

namespace App\Http\Controllers;

use App\Actions\Posts\LatestPostsAction;

class HomeController extends Controller
{

    public function index(LatestPostsAction $latestPostsAction)
    {
        return view('home')->with([
            "posts" => $latestPostsAction->run()
        ]);
    }
}
