<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function projects()
    {
        $projects = DB::table('projects')->get();
    
        return view('projects', compact('projects'));
    }
    
    

    public function create()
    {
        $this->authorize('create-project');

        // Code to create a new project goes here
    }
}
