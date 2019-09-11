<?php


namespace App\Actions\Projects;


class UpdateProjectAction
{
    protected $fetchProjectAction;

    public function __construct(FetchProjectAction $fetchProjectAction)
    {
        $this->fetchProjectAction = $fetchProjectAction;
    }

    public function run($requestData, $id)
    {
        $project = $this->fetchProjectAction->run($id);
        $project->update($requestData);

        return $project;
    }
}
