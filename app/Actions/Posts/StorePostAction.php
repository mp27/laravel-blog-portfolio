<?php


namespace App\Actions\Posts;


use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

        if ($post->published) {
            Cache::forget('latestPosts');
        }

        return $post;
    }
}
