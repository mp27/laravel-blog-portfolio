<?php


namespace App\Actions\Posts;


use App\Actions\Files\DeleteThumbnailAction;

class DeletePostAction
{
    protected $postAction;
    protected $deleteThumbnailAction;

    public function __construct(FetchPostAction $postAction, DeleteThumbnailAction $deleteThumbnailAction)
    {
        $this->postAction = $postAction;
        $this->deleteThumbnailAction = $deleteThumbnailAction;
    }

    public function run($id)
    {
        $post = $this->postAction->run($id);
        $thumbnailPath = $post->thumbnail;

        $postDeleted = $post->delete();

        if ($postDeleted) {
            $this->deleteThumbnailAction->run($thumbnailPath);
        }

        return $postDeleted;
    }

}
