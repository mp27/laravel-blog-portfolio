<?php


namespace App\Actions\Files;


use Intervention\Image\Facades\Image;

class CreatePostFileAction
{
    public function __construct()
    {
    }

    public function run($file, $width = 1280)
    {
        $fileName = "images/{$file->getClientOriginalName()}";

        Image::make($file)->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($fileName);

        return $fileName;
    }
}
