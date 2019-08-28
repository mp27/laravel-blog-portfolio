<?php


namespace App\Actions\Posts;


use App\Post;

class GetPublicPostBySlug
{
    public function __construct()
    {
    }

    public function run($slug) {
        return Post::where('slug', $slug)->published()->firstOrFail();
    }
}
