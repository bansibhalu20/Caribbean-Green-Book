<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $data['category'] = Category::all();
        return view('admin.categories.view',$data);
    }
    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.categories.add',$data);
    }
    public function store(Request $request)
    {
        try
        {
            // $request->validate([
            //     'parent_category_id' => 'nullable|exists:tbl_category,id',
            //     'title' => 'required|string',
            //     'image' => 'required',
            // ]);
            
            $category = new Category();
            $category->parent_category_id = $request->input('parent_cate_id');
            $category->title = $request->input('cate_name');
            $category->description = $request->input('description');

            if($request->hasFile('avatar'))
            {
                $file = $request->file('avatar');
                $fileName = 'admin/category_image/' .$file->getClientOriginalName();

                //Move the uploaded file to the publiv disk
                $file->storeAs('public',$fileName);

                // Update the image attribute with the file path
                $category->image = $fileName;
            }
            //saved data
            $category->save();

            return redirect()->route('admin.viewcate')->with('success','Category added successfully...');
        }catch(\Exception $e)
        {
            // Log the exception with today's date in the daily log channel
            Log::channel('daily')->error('[' . now() . '] ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage()); 
        }
    }
    public function editCategory($id)
    { 
        $category = Category::with('parentCategory')->findorfail($id);
        $parentCategories = Category::whereNull('parent_category_id')->get(); // Fetch only top-level categories
        return view('admin.categories.edit',compact('category','parentCategories'));
    }
    public function updateCategory(Request $request,$id)
    {
       
        $category = Category::findOrFail($id);
        $category->update([
            'title' => $request->input('name'),
            'description' => $request->input('description'),
            'parent_category_id' => $request->input('parent_cate_id'),
            //handle the image upload
            'image' => $category->image, //Default to the existing image
        ]);

        if($request->hasFile('image'))
        {
            //process and save the uploaded image
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('admin/category_image/', $imageName);

            //Delete the old image if it exists
            if($category->image){
                Storage::delete('admin/category_image/'.$category->image);
            }
            //update the image attributes in the database 
            $category->image = $imageName;
            $category->save();
        }

        return redirect()->route('admin.category.edit',['id' => $id])->with('success','Category Updated Successfully...');
    }
}
