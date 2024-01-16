<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function showProfile()
    {
        try{
            //Retrieve the authenticated user
            $admin = Auth::guard('admin')->user();
            return view('admin.showProfile',['admin'=>$admin]);
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
    public function editProfile($id)
    {
        try{
            $user = Admin::find($id);
            return view('admin.editprofile',compact('user'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function updateProfile(Request $request,$id)
    {
        try{
            //validation
            // $request->validate([
            //     'name' => 'required|string|max:255',
            //     'contact_email'=>'required|email',
            //     'address' => 'required',
            //     'phone'=> 'required',
            // ]);
            //find admin records
            $admin = Admin::find($id);

            //update fields
            $admin->name = $request->input('name');
            $admin->contact_email = $request->input('contact_email');
            $admin->address = $request->input('address');
            $admin->phone = $request->input('phone');
           
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = 'admin/profile_image/' . $file->getClientOriginalName();
                
                // Move the uploaded file to the public disk
                $file->storeAs('public', $fileName);
            
                // Update the image attribute with the file path
                $admin->image = $fileName;
            }
            
            //saved the updated profile
            $admin->save();

            // Redirect back to the profile page
            return redirect()->route('admin.showprofile');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
