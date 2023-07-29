<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Project;


class ProjectsController extends Controller
{
    public function projects()
    {
        $projects = DB::table('projects')->get();
        return view('projects.projects', compact('projects'));
    }

    public function show($id)
    {
        $project = DB::table('projects')->find($id);
    
        if (!$project) {
            abort(404);
        }
    
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        $this->authorize('create-project');

        // Code to create a new project goes here
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // Add other validation rules as needed
        ]);
    
        // Create a new project with the validated data
        DB::table('projects')->insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumbnail' => 'default-thumbnail.jpg', // Provide a default value or actual thumbnail path here
            // Set other project attributes as needed
        ]);
    
        // Redirect to the projects page or any other appropriate page
        return redirect()->route('projects')->with('success', 'Project created successfully.');
    }
    
    // ProjectsController.php

    public function edit($id)
    {
        $project = DB::table('projects')->find($id);

        if (!$project) {
            abort(404);
        }

        return view('projects.edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // Remove the validation for description
            // 'description' => 'required',
        ]);
    
        // Retrieve the project record
        $project = DB::table('projects')->find($id);
    
        if (!$project) {
            abort(404);
        }
    
        // Update the project title
        $project->title = $request->input('title');
    
        // Save the updated title
        $project->save();
    
        // Handle the description separately, if it's changed
        if ($request->has('description')) {
            $description = $request->input('description');
    
            // Save the description as is (it will be in HTML format)
            $project->description = $description;
    
            // Save the updated description
            $project->save();
        }
    
        // Handle the thumbnail image update (if applicable)
        if ($request->hasFile('thumbnail')) {
            // Delete the old thumbnail if it exists
            Storage::delete($project->thumbnail);
    
            // Store the new thumbnail
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails');
    
            // Save the thumbnail path to the project record
            $project->thumbnail = $thumbnailPath;
    
            // Save the updated thumbnail path
            $project->save();
        }
    
        return redirect()->route('projects.show', ['id' => $id])->with('success', 'Project updated successfully.');
    }
    

    // ProjectsController.php

    public function destroy(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // Remove the validation for description
            // 'description' => 'required',
        ]);
        $project = DB::table('projects')->find($id);
    
        if (!$project) {
            abort(404);
        }
        // Check if the authenticated user is authorized to delete the project
        $this->authorize('delete', $project);

        // Perform the delete operation
        $project->delete();

        return redirect()->route('projects')->with('success', 'Project deleted successfully.');
    }
    
}
