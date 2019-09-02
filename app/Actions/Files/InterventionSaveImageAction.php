<?php


namespace App\Actions\Files;


use Intervention\Image\Facades\Image;

class InterventionSaveImageAction
{
    public function __construct()
    {

    }

    public function run($file, $width, $fileName)
    {
        Image::make($file)->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($fileName);
    }
}
