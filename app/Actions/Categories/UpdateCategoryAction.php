<?php


namespace App\Actions\Categories;


class UpdateCategoryAction
{
    protected $fetchCategoryAction;

    public function __construct(FetchCategoryAction $fetchCategoryAction)
    {
        $this->fetchCategoryAction = $fetchCategoryAction;
    }

    public function run($requestData, $id)
    {
        $category = $this->fetchCategoryAction->run($id);
        $category->update($requestData);

        return $category;
    }
}
