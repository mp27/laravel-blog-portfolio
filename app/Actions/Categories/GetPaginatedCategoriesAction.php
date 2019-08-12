<?php


namespace App\Actions\Categories;


use App\Category;
use Illuminate\Http\Request;

class GetPaginatedCategoriesAction
{
    public function __construct()
    {
    }

    public function run(Request $request, $perPage = 25)
    {
        return Category::latest()->paginate($perPage);
    }
}
