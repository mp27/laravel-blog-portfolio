<?php


namespace App\Actions\Projects;


use App\Project;

class DeleteProjectAction
{
    public function __construct()
    {
    }

    public function run($id)
    {
        return Project::destroy($id);
    }
}
