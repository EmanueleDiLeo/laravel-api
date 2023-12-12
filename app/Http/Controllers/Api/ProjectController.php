<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        // $projects = Project::all();
        // $projects = Project::with('type','technologies')->all();
        // $projects = Project::paginate(12);
        $projects = Project::with('type','technologies')->paginate(12);
        return response()->json($projects);
    }

    public function getProjectBySlug($slug){
        // $project = Project::where('slug',$slug)->first();
        $project = Project::where('slug',$slug)->with('type', 'technologies')->first();

        if($project) $success = true;
        else $success = false;

        if($success){
            if($project->image){
                $project->image = asset('storage/' . $project->image);
            }else{
                $project->image = asset('storage/uploads/placeholder.webp');
            }
        }


        return response()->json(compact('project', 'success') );
    }
}
