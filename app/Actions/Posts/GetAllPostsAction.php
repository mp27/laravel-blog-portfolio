<?php


namespace App\Actions\Posts;


use App\Post;
use Illuminate\Http\Request;

class GetAllPostsAction
{
    public function __construct()
    {
    }

    public function run(Request $request, $perPage = 25)
    {
        return Post::latest()->with('category')->paginate($perPage);
    }

}
