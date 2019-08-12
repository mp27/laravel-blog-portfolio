<?php


namespace App\Actions\Tags;


class UpdateTagAction
{
    protected $fetchTagAction;

    public function __construct(FetchTagAction $fetchTagAction)
    {
        $this->fetchTagAction = $fetchTagAction;
    }

    public function run($requestData, $id)
    {
        $tag = $this->fetchTagAction->run($id);
        $tag->update($requestData);

        return $tag;
    }
}
