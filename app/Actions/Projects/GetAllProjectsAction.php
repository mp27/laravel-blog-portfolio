<?php


namespace App\Actions\Projects;


use App\Project;

class GetAllProjectsAction
{
    public function __construct()
    {
    }

    public function run()
    {
        return Project::all();
    }

}
