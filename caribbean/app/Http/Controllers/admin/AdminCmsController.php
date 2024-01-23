<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cms;

class AdminCmsController extends Controller
{
    public function showAddCms()
    {
        $cmsData = Cms::all();

        return view('admin.cms.add_cms', compact('cmsData'));

    }   
    
    public function create()
    {
        return view('admin.cms.create_cms');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title must not exceed 255 characters.',
            'description.required' => 'The description field is required.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
            'image.max' => 'The image must not be larger than 2048 kilobytes.',
        ]);

        // Save the image to the specified directory
        $imagePath = $request->file('image')->store('admin/cms_img', 'public');

        // Save data to the database
        $cms = new Cms;
        $cms->title = $request->title;
        $cms->description = $request->description;
        $cms->image = $imagePath;
        $cms->slug = Str::slug($request->title); // Create a slug based on the title
        $cms->save();

        return redirect()->route('admin.cms-add')->with('success', 'CMS added successfully!');
    
    }

    
    public function edit($id)
{
    // Fetch CMS data based on $id from the database
    $cms = Cms::find($id);

    // Pass the CMS data to the view
    return view('admin.cms.edit_cms', compact('cms'));
}

}
