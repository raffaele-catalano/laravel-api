<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {

        // $projects = Project::all();
        $projects = Project::with('type', 'technologies')->get();

        return response()->json($projects);
    }

    public function details($slug) {

        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();

        return response()->json($project);
    }
}
