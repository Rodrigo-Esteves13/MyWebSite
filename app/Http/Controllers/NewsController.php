<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsController extends Controller
{
    public function news()
    {
        $news = DB::table('news')->get();
        return view('news.news', compact('news'));
    }

    public function show($id)
    {
        $news = DB::table('news')->find($id);
    
        if (!$news) {
            abort(404);
        }
    
        return view('news.show', compact('news'));
    }

    public function create()
    {
        $this->authorize('create', News::class);

        // Code to create a new news goes here
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:100000', // Set your desired image types and maximum size
            'description' => 'required|string', // Trix editor content
        ]);
    
        // Handle the thumbnail upload and store the image file
        if ($request->hasFile('thumbnail')) {
            $thumbnailFile = $request->file('thumbnail');
            $thumbnailPath = $thumbnailFile->store('thumbnails_news', 'public'); // Change the storage path
        } else {
            // If no thumbnail is provided, use a default image
            $thumbnailPath = 'img/thumbnail-default.jpg';
        }
    
        // Create a new news instance with the validated data
        $news = new news([
            'title' => $request->input('title'),
            'thumbnail' => $thumbnailPath,
        ]);
    
        // Use the `setAttribute` method from the `HasTrixRichText` trait to handle rich text content
        $news->setAttribute('description', $request->input('description'));
    
        // Save the new news to the database
        $news->save();
    
        return redirect()->route('news.index')->with('success', 'news created successfully.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'new_thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:5100', // Set your desired image types and maximum size
        ]);

        // Retrieve the news record
        $news = news::find($id);

        if (!$news) {
            abort(404);
        }
        
        if ($request->has('description')) {
            $news->description = strip_tags($request->input('description')); // Remove HTML tags
        }
        // Update the news title and description
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->save();

        // Handle the new thumbnail image update (if applicable)
        if ($request->hasFile('new_thumbnail')) {
            // Delete the old thumbnail if it exists
            Storage::delete($news->thumbnail);

            // Store the new thumbnail
            $thumbnailPath = $request->file('new_thumbnail')->store('public/thumbnails_news');

            // Save the thumbnail path to the news record
            $news->thumbnail = str_replace('public/', '', $thumbnailPath);
            $news->save();
        }

        return redirect()->route('news.show', ['id' => $id])->with('success', 'news updated successfully.');
    }

    public function edit($id)
    {
        $news = DB::table('news')->find($id);

        if (!$news) {
            abort(404);
        }

        return view('news.edit', compact('news'));
    }

    public function destroy($id)
    {
        // Retrieve the news record
        $news1 = news::find($id);

        if (!$news1) {
            abort(404);
        }

        // Check if the authenticated user is authorized to delete the news
        $this->authorize('delete', $news1);

        // Delete the news's thumbnail file from storage
        Storage::delete($news1->thumbnail);

        // Perform the delete operation
        $news1->delete();

        return redirect()->route('news')->with('success', 'news deleted successfully.');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $image = $request->file('file');
            $imguploadPath = $image->store('img_description_news', 'public');
    
            return response()->json(['success' => true, 'file' => ['url' => asset('storage/'.$imguploadPath)]]);
        }
    
        return response()->json(['success' => false, 'message' => 'Failed to upload image.']);
    }
}
