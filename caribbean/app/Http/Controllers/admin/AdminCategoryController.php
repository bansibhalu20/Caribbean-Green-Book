<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;
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
        try{
            $category = Category::with('parentCategory')->findorfail($id);
            $parentCategories = Category::whereNull('parent_category_id')->get(); // Fetch only top-level categories
            return view('admin.categories.edit',compact('category','parentCategories'));
        }catch(\Exception $e)
        {
              // Handle the exception
              return redirect()->back()->with("error", $e->getMessage());
        }
    }
    public function updateCategory(Request $request,$id)
    {
        try
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
                $file = $request->file('image');
                    $fileName = 'admin/category_image/' .$file->getClientOriginalName();

                    //Move the uploaded file to the publiv disk
                    $file->storeAs('public',$fileName);

                    // Update the image attribute with the file path
                    $category->image = $fileName;
            
            }
            $category->save();
            return redirect()->route('admin.category-edit',['id' => $id])->with('success','Category Updated Successfully...');
         }catch(\Exception $e)
         {
              // Handle the exception
              return redirect()->back()->with("error",$e->getMessage());
         }
     }
    public function deleteCategory($id)
    {
        try{
            $category = Category::find($id);

            if(!$category){
                return redirect()->back()->with('error','Category not found');
            }
            if ($category->image) {
                $imagePath = public_path('admin/category_image/') . $category->image;

                if (file_exists($imagePath)) {
                    // Delete the image file
                    unlink($imagePath);
                }
            }
            $category->delete();
            return redirect()->back()->with('success','Category deleted successfully...');
        }catch(\Exception $e)
        {
              // Handle the exception
              return redirect()->back()->with("error",$e->getMessage());
        }
        
    }
    public function dataTable()
    {
        $categories = Category::select(['id', 'title', 'image', 'description']);

        return datatables()->of($categories)
            ->addColumn('checkbox', function ($category) {
                // Add checkbox HTML if needed
                return '<input type="checkbox" value="'.$category->id.'">';
            })
            ->addColumn('image', function ($category) {
                // Add image HTML if needed
                return '<img src="'.asset('admin/category_image/'.$category->image).'" height="50px" width="50px" style="border-radius: 30px;" alt="Image">';
            })
            ->addColumn('actions', function ($category) {
                // Add actions HTML (edit and delete buttons) if needed
                return '<a href="'.route('admin.category-edit', ['id' => $category->id]).'" class="btn-info btn btn-sm btn-icon"><i class="fas fa-edit"></i></a>
                        <a href="'.route('admin.category-delete', ['id' => $category->id]).'" class="btn-danger btn btn-sm btn-icon btn-delete"><i class="fas fa-trash-alt"></i></a>';
            })
            ->rawColumns(['checkbox', 'image', 'actions'])
            ->toJson();
    }
}
