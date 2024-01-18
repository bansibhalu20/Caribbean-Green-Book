<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

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
}
