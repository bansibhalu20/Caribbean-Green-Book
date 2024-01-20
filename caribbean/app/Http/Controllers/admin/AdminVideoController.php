<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    
    public function showAddView()
    {
        try {
            $videos = Video::all();
            return view('admin.video.add', compact('videos'));
        } catch (\Exception $e) {
            // Handle the exception
            Alert::error('Error', 'An error occurred while fetching videos.');
            return redirect()->back(); // Redirect back previous page
        }   
    }

    public function getDataTables()
    {
        // dd('Inside getDataTables');
    $videos = Video::select(['id', 'title', 'image', 'link', 'action'])->get();

    return response()->json(['data' => $videos]);
    }


    public function showCreateView()
    {
        try {
            return view('admin.video.create');
        } catch (\Exception $e) {
            // Handle the exception
            Alert::error('Error', 'An error occurred while loading the create view.');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|max:255',
                'link' => 'required|url|regex:/^https?:\/\/\S+$/i',
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ], [
                'title.required' => 'The title field is required.',
                'title.max' => 'The title must not exceed 255 characters.',
                'link.required' => 'The link field is required.',
                'link.url' => 'Please enter a valid URL for the link.',
                'image.image' => 'The logo must be an image file.',
                'image.mimes' => 'Accepted formats for the logo are: png, jpg, jpeg.',
                'image.max' => 'The logo must not be larger than 2MB.',
            ]);
    
            // Handle file upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/admin/video_img');
            } else {
                $imagePath = null;
            }
    
            // Create a new Video instance and save to the database
            Video::create([
                'title' => $request->input('title'),
                'link' => $request->input('link'),
                'image' => $imagePath,
            ]);
    
            // Redirect or respond as needed
            // return redirect()->route('admin.video.add')->with('success', 'Video added successfully');

            // Show  success message
            Alert::success('Success', 'Video added successfully');

            // Redirect 
            return redirect()->route('admin.video.add');
        } catch (QueryException $e) {
            // Handle the exception
            Alert::error('Error', 'An error occurred while adding the video.');
            return redirect()->back(); // Redirect back to the form 
        }
    }
    
   
    public function showEditView($id)
    {
        try {
            $video = Video::findOrFail($id);
            return view('admin.video.edit', compact('video'));
        } catch (\Exception $e) {
            // Handle the exception
            Alert::error('Error', 'An error occurred while loading the edit view.');
            return redirect()->back(); // Redirect back previous page 
        }
    }



    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|max:255',
                'link' => 'required|url|regex:/^https?:\/\/\S+$/i',
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ], [
                'title.required' => 'The title field is required.',
                'title.max' => 'The title must not exceed 255 characters.',
                'link.required' => 'The link field is required.',
                'link.url' => 'Please enter a valid URL for the link.',
                'image.image' => 'The logo must be an image file.',
                'image.mimes' => 'Accepted formats for the logo are: png, jpg, jpeg.',
                'image.max' => 'The logo must not be larger than 2MB.',
            ]);
    
            $video = Video::findOrFail($id);
    
            // Handle file upload
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($video->image) {
                    Storage::delete("public/admin/video_img/{$video->image}");
                }
    
                // Store new image
                $imagePath = $request->file('image')->store('public/admin/video_img');
                $video->image = $imagePath;
            }
    
            $video->title = $request->input('title');
            $video->link = $request->input('link');
            $video->save();
    
            // Show success message
            Alert::success('Success', 'Video updated successfully');
    
            // Redirect with a success alert
            return redirect()->route('admin.video.add')->with('success', 'Video updated successfully');
        } catch (\Exception $e) {
            // Handle the exception
            Alert::error('Error', 'An error occurred while updating the video.');
            return redirect()->back()->withInput(); // Redirect back to the form
        }
    }

    public function destroy($id)
    {
        try {
            $video = Video::findOrFail($id);

            // Delete the image  if it exists
            if ($video->image) {
                Storage::delete("public/admin/video_img/{$video->image}");
            }

            $video->delete();

            // Show SweetAlert success message
            Alert::success('success', 'Video deleted successfully');

            return redirect()->route('admin.video.add');
        } catch (\Exception $e) {
            // Handle the exception
            Alert::error('error', 'An error occurred while deleting the video.');
            return redirect()->back();
        }
    }
}
