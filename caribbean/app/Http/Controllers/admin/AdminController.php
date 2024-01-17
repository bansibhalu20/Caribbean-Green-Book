<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


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
            $request->validate([
                'name' => 'required|string|max:255',
                'contact_email'=>'required|email',
                'address' => 'required',
                'phone'=> 'required',
            ]);
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
            return redirect()->route('admin.showprofile')->with('success','Profile Update Successfully...');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function showPassword()
    {
        return view('admin.changepwd');
    }
    public function changePassword(Request $request)
    {
        try{
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ]);
            
            if(Auth::guard('admin')->check()){
                $admin = Auth::guard('admin')->user();
               
                // Verify if the provided current password matches the user's current password
                if(!Hash::check($request->old_password,$admin->password)){
                    return redirect()->back()->with('error','The current password is incorrect');
                }

                //Update the user's password
                $admin->password = Hash::make($request->new_password);
                $admin->save();
               
                return redirect()->route('adminDashboard')->with('success','Password updated successfully');  
            }
            
        }catch(\Exception $e)
        {  
             // Log the exception with today's date in the daily log channel
            Log::channel('daily')->error('[' . now() . '] ' . $e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
