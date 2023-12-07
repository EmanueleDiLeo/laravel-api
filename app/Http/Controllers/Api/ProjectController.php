<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        // $projects = Project::all();
        $projects = Project::paginate(12);
        // $projects = Project::with('type')->all();
        return response()->json($projects);
    }

    public function getProjectBySlug($slug){
        $project = Project::where('slug',$slug)->first();
        return response()->json($project);
    }
}
