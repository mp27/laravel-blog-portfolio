<?php


namespace App\Actions\Categories;


use App\Category;

class FetchCategoryAction
{
    public function __construct()
    {
    }

    public function run($id)
    {
        return Category::findOrFail($id);
    }
}
