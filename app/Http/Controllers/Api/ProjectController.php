<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {

        $project = Project::all();

        // $project = Project::paginate(3);

        $project = Project::with('type', 'technologies')->get();
        return response()->json([
            'status' => 'success',
            'results' => $project,
        ]);
    }
}
