<?php


namespace App\Actions\Posts;


use Illuminate\Http\Request;

class UpdatePostAction
{
    protected $preparePostAction;
    protected $fetchPostAction;

    public function __construct(PreparePostAction $preparePostAction, FetchPostAction $fetchPostAction)
    {
        $this->preparePostAction = $preparePostAction;
        $this->fetchPostAction = $fetchPostAction;
    }

    public function run(Request $request, $id)
    {
        $requestData = $this->preparePostAction->run($request);
        $post = $this->fetchPostAction->run($id);
        $post->update($requestData);
        $post->tags()->sync($request->tags);

        return $post;
    }
}
