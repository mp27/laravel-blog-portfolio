<?php


namespace App\Actions\Posts;


use App\Post;
use Illuminate\Http\Request;

class GetAllPublicPostsAction
{
    public function __construct()
    {
    }

    public function run(Request $request, $perPage = 25)
    {
        return Post::latest()->published()->paginate($perPage);
    }

}
