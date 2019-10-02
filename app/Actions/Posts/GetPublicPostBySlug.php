<?php


namespace App\Actions\Posts;


use App\Post;
use Illuminate\Support\Facades\Cache;

class GetPublicPostBySlug
{
    public function __construct()
    {
    }

    public function run($slug) {
        return Cache::remember("singlePost-{$slug}", 60 * 60 * 24, function () use ($slug) {
            return Post::where('slug', $slug)->published()->firstOrFail();
        });
    }
}
