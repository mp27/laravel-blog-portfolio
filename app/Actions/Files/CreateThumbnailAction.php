<?php


namespace App\Actions\Files;


use Intervention\Image\Facades\Image;

class CreateThumbnailAction
{
    public function __construct()
    {
    }

    public function run($file, $title, $width = 300)
    {
        $fileName = "thumbnails/{$title}.{$file->getClientOriginalExtension()}";

        Image::make($file)->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($fileName);

        return $fileName;
    }
}
