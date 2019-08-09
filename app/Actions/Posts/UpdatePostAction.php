<?php


namespace App\Actions\Posts;


use App\Actions\Files\CreateThumbnailAction;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UpdatePostAction
{
    protected $createThumbnailAction;
    protected $fetchPostAction;

    public function __construct(CreateThumbnailAction $createThumbnailAction, FetchPostAction $fetchPostAction)
    {
        $this->createThumbnailAction = $createThumbnailAction;
        $this->fetchPostAction = $fetchPostAction;
    }

    public function run(Request $request, $id)
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

        $post = $this->fetchPostAction->run($id);
        $post->update($requestData);
        $post->tags()->sync($request->tags);

        return $post;
    }
}
