<?php


namespace App\Actions\Tags;


use App\Tag;

class GetAllTagsAction
{
    public function __construct()
    {
    }

    public function run()
    {
        return Tag::all();
    }

}
