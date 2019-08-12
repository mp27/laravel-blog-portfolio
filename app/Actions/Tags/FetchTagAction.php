<?php


namespace App\Actions\Tags;


use App\Tag;

class FetchTagAction
{
    public function __construct()
    {
    }

    public function run($id)
    {
        return Tag::findOrFail($id);
    }
}
