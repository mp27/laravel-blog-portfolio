<?php


namespace App\Actions\Projects;


use App\Project;

class StoreProjectAction
{
    public function __construct()
    {
    }

    public function run($requestData)
    {
        return Project::create($requestData);
    }
}
