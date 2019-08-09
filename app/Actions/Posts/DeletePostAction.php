<?php


namespace App\Actions\Posts;


use App\Post;

class DeletePostAction
{
    public function __construct()
    {
    }

    public function run($id)
    {
        return Post::destroy($id);
    }

}
