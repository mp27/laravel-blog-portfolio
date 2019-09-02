<?php


namespace App\Actions\Files;


class CreateThumbnailAction
{
    private $interventionSaveImageAction;

    public function __construct(InterventionSaveImageAction $interventionSaveImageAction)
    {
        $this->interventionSaveImageAction = $interventionSaveImageAction;
    }

    public function run($file, $title, $width = 300)
    {
        $fileName = "thumbnails/{$title}.{$file->getClientOriginalExtension()}";

        $this->interventionSaveImageAction->run($file, $width, $fileName);

        return $fileName;
    }
}
