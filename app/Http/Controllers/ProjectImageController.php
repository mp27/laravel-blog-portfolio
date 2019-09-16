<?php

namespace App\Http\Controllers;

use App\Actions\Projects\DeleteProjectImageAction;
use App\ProjectImage;

class ProjectImageController extends Controller
{
    public function destroy(ProjectImage $projectImage, DeleteProjectImageAction $deleteProjectImageAction)
    {
        return response()->json($deleteProjectImageAction->run($projectImage));
    }
}
