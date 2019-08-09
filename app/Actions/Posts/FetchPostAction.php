<?php


namespace App\Actions\Posts;


use App\Post;

class FetchPostAction
{
    public function __construct()
    {
    }

    public function run($id)
    {
        return Post::findOrFail($id);
    }

}
