<?php


namespace App\Actions\Posts;


use App\Actions\Files\CreateThumbnailAction;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StorePostAction
{
    protected $createThumbnailAction;

    public function __construct(CreateThumbnailAction $createThumbnailAction)
    {
        $this->createThumbnailAction = $createThumbnailAction;
    }

    public function run(Request $request)
    {
        $requestData = $request->all();

        $requestData['published'] = false;

        if ($request->published) {
            $requestData['published'] = true;
        }

        if ($request->hasFile('thumbnail')) {
            $title = Str::slug($requestData['title'], '-');
            $requestData['thumbnail'] = $this->createThumbnailAction->run($request->file('thumbnail'), $title);
        }

        $post = Post::create($requestData);
        $post->tags()->sync($request->tags);

        return $post;
    }
}
