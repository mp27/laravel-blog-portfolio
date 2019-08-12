<?php


namespace App\Actions\Tags;


use App\Tag;
use Illuminate\Http\Request;

class GetPaginatedTagsAction
{
    public function __construct()
    {
    }

    public function run(Request $request, $perPage = 25)
    {
        return Tag::latest()->paginate($perPage);
    }
}
