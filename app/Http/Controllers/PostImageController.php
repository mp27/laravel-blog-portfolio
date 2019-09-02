<?php

namespace App\Http\Controllers;

use App\Actions\Files\CreatePostFileAction;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
    public function store(Request $request, CreatePostFileAction $createPostFileAction)
    {
        $image = $createPostFileAction->run($request->image);

        return response()->json([
            "url" => asset($image)
        ]);
    }
}
