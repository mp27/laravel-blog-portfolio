<?php


namespace App\Actions\Projects;


use App\Project;

class StoreProjectAction
{
    protected $attachProjectImagesAction;

    public function __construct(AttachProjectImagesAction $attachProjectImagesAction)
    {
        $this->attachProjectImagesAction = $attachProjectImagesAction;
    }

    public function run($requestData)
    {
        $project = Project::create($requestData);

        $project->tags()->sync($requestData['tags']);

        if (!empty($requestData['images'])) {
            $this->attachProjectImagesAction->run($project->id, $requestData['images']);
        }
        
        return $project;
    }
}
