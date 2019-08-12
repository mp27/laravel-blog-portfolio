<?php


namespace App\Actions\Tags;


use App\Tag;

class DeleteTagAction
{
    public function __construct()
    {
    }

    public function run($id)
    {
        return Tag::destroy($id);
    }
}
