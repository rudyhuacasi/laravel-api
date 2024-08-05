<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {

        // $project = Project::all();

        $project = Project::paginate(9);

        // $project = Project::with('type', 'technologies')->get();
        return response()->json([
            'status' => 'success',
            'results' => $project,
        ]);
    }

    public function show(string $slug){
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();
        if ($project) {
            return response()->json([
                'status' => true,
                'results' => $project,
            ]);
        }else{
            return response()->json([
                'status' => false,
                'results' => null,
            ], 504);
        }
    }
}
