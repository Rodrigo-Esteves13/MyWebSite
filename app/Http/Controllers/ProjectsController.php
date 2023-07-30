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
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Set your desired image types and maximum size
        ]);

        // Handle the thumbnail upload
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails');
        }

        // Create a new project with the validated data
        Project::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    
        // Retrieve the project record
        $project = Project::find($id);
    
        if (!$project) {
            abort(404);
        }
    
        // Update the project title
        $project->title = $request->input('title');
    
        // Handle the description separately, if it's changed
        if ($request->has('description')) {
            $project->description = strip_tags($request->input('description')); // Remove HTML tags
        }
    
        // Save the updated title and description
        $project->save();
    
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

    public function edit($id)
    {
        $project = DB::table('projects')->find($id);

        if (!$project) {
            abort(404);
        }

        return view('projects.edit', compact('project'));
    }

    // ProjectsController.php

    public function destroy($id)
    {
        // Retrieve the project record
        $project = Project::find($id);

        if (!$project) {
            abort(404);
        }

        // Check if the authenticated user is authorized to delete the project
        $this->authorize('delete', $project);

        // Delete the project's thumbnail file from storage
        Storage::delete($project->thumbnail);

        // Perform the delete operation
        $project->delete();

        return redirect()->route('projects')->with('success', 'Project deleted successfully.');
    }

    
}
