<?php


namespace App\Actions\Files;


class CreatePostFileAction
{
    private $interventionSaveImageAction;

    public function __construct(InterventionSaveImageAction $interventionSaveImageAction)
    {
        $this->interventionSaveImageAction = $interventionSaveImageAction;
    }

    public function run($file, $width = 1280)
    {
        $fileName = "images/{$file->getClientOriginalName()}";

        $this->interventionSaveImageAction->run($file, $width, $fileName);

        return $fileName;
    }
}
