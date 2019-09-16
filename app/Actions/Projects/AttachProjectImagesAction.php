<?php


namespace App\Actions\Projects;


use App\Actions\Files\InterventionSaveImageAction;
use App\ProjectImage;

class AttachProjectImagesAction
{
    protected $interventionSaveImageAction;

    public function __construct(InterventionSaveImageAction $interventionSaveImageAction)
    {
        $this->interventionSaveImageAction = $interventionSaveImageAction;
    }

    public function run($projectId, $images)
    {
        $projectImages = [];

        foreach ($images as $image) {
            $fileName = "projects/{$image->getClientOriginalName()}";
            $this->interventionSaveImageAction->run($image, 1280, $fileName);
            $projectImages[] = [
                'src' => $fileName,
                'project_id' => $projectId
            ];
        }

        ProjectImage::insert($projectImages);
    }
}
