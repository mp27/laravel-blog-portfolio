<?php


namespace App\Actions\Tags;


use App\Tag;

class StoreTagAction
{
    public function __construct()
    {
    }

    public function run($requestData)
    {
        return Tag::create($requestData);
    }
}
