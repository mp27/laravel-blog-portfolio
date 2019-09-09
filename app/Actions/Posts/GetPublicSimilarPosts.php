<?php


namespace App\Actions\Posts;


use App\Post;

class GetPublicSimilarPosts
{
    public function __construct()
    {
    }

    public function run(Post $post, $limit = 3)
    {
        return Post::published()
            ->where(function ($q) use ($post) {
                return $q->where('category_id', $post->category_id)
                    ->orWhereHas('tags', function ($query) use ($post) {
                        return $query->whereIn('id', $post->tags()->pluck('id'));
                    });
            })
            ->where('id', '<>', $post->id)
            ->inRandomOrder()
            ->take($limit)->get();
    }
}
