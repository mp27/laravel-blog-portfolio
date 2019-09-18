<?php

namespace App\Http\Controllers;

use App\Actions\Projects\GetAllProjectsAction;

class PublicProjectsController extends Controller
{
    public function index(GetAllProjectsAction $getAllProjectsAction)
    {
        return view('portfolio.projects')->with([
            "projects" => $getAllProjectsAction->run()
        ]);
    }
}
