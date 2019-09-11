<?php


namespace App\Actions\Projects;


use App\Project;

class FetchProjectAction
{
    public function __construct()
    {
    }

    public function run($id)
    {
        return Project::findOrFail($id);
    }
}
