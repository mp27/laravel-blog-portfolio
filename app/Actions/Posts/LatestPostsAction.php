<?php


namespace App\Actions\Posts;


use App\Post;

class LatestPostsAction
{
    public function __construct()
    {
    }

    public function run($limit = 5)
    {
        return Post::latest()->published()->take($limit)->get();
    }
}
