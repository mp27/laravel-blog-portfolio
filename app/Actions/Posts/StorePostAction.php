<?php


namespace App\Actions\Posts;


use App\Post;
use Illuminate\Http\Request;

class StorePostAction
{
    protected $preparePostAction;

    public function __construct(PreparePostAction $preparePostAction)
    {
        $this->preparePostAction = $preparePostAction;
    }

    public function run(Request $request)
    {
        $requestData = $this->preparePostAction->run($request);
        $post = Post::create($requestData);
        $post->tags()->sync($request->tags);

        return $post;
    }
}
