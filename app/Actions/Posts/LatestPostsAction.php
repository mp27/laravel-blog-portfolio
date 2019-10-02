<?php


namespace App\Actions\Posts;


use App\Post;
use Illuminate\Support\Facades\Cache;

class LatestPostsAction
{
    public function __construct()
    {
    }

    public function run($limit = 5)
    {
        return Cache::remember('latestPosts', 60 * 60 * 24, function () use ($limit) {
            return Post::latest()->published()->take($limit)->get();
        });
    }
}
