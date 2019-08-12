<?php


namespace App\Actions\Categories;


use App\Category;

class DeleteCategoryAction
{
    public function __construct()
    {
    }

    public function run($id)
    {
        return Category::destroy($id);
    }
}
