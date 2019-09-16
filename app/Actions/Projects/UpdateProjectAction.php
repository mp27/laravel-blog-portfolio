<?php


namespace App\Actions\Projects;


class UpdateProjectAction
{
    protected $fetchProjectAction;
    protected $attachProjectImagesAction;

    public function __construct(FetchProjectAction $fetchProjectAction, AttachProjectImagesAction $attachProjectImagesAction)
    {
        $this->fetchProjectAction = $fetchProjectAction;
        $this->attachProjectImagesAction = $attachProjectImagesAction;
    }

    public function run($requestData, $id)
    {
        $project = $this->fetchProjectAction->run($id);

        $project->update($requestData);

        $project->tags()->sync($requestData['tags']);

        if (!empty($requestData['images'])) {
            $this->attachProjectImagesAction->run($id, $requestData['images']);
        }

        return $project;
    }
}
