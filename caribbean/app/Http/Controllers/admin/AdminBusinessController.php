<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Country;
use App\Models\Category;
use App\Models\Plan;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert; 
class AdminBusinessController extends Controller
{
   // Display the form to create a new business
   public function create()
   {
       // Fetch data for dropdowns: countries, categories, and plans
       $data['name'] = Country::all();
       $data['category'] = Category::all();
       $data['plan'] = Plan::all();
       return view('admin.business.add', $data);
   }
    // Store a new business in the database
    public function store(Request $request)
    {
         // Create a new Business model instance
        $business = new Business();
         // Assign input values to the corresponding attributes
        $business->name = $request->input('name');
        $business->email = $request->input('email');
        $business->website = $request->input('site');
        $business->business_owner_name = $request->input('owner_name');
        $business->phone = $request->input('phone1');
        $business->phone2 = $request->input('phone2');
        $business->zipcode = $request->input('zip_code');
        $business->address = $request->input('address');
        $business->how_old_ur_business = $request->input('how_old_ur_business');
        $business->description = $request->input('description');
        $business->hear_about_us = $request->input('about_us');
        $business->category_id = $request->input('category');   
        $business->plan_id = $request->input('plan');
        $business->business_industry = $request->input('business_industry');
        $business->is_felony = $request->input('is_felony');
        $business->country_id = $request->input('country');
        $business->state = $request->input('state');
        $business->city = $request->input('city'); 
          // Handle file upload for the business image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'admin/business_image/' . $file->getClientOriginalName();   
            // Move the uploaded file to the public disk
            $file->storeAs('public', $fileName);        
            // Update the image attribute with the file path
            $business->image = $fileName;
        }
          // Save the business to the database
        $business->save();
         // Redirect to the business view page after successfully storing the business
        return redirect(route('admin.business-show'));
    }

   // Display a list of businesses
   public function show()
   {
       // Retrieve businesses with associated country names
       $businesses = Business::join('tbl_country', 'tbl_country.id', '=', 'tbl_business.country_id')
           ->select('tbl_business.*', 'tbl_country.name as country_name')
           ->get();

       // Display the view with the list of businesses
       return view('admin.business.view', compact('businesses'));
   }

     // Display the form to edit a specific business
     public function edit($id)
     {
         // Retrieve the business with the given ID
         $busi = Business::find($id);
 
         // Fetch data for dropdowns: countries, categories, and plans
         $data['countries'] = Country::all();
         $data['categories'] = Category::all();
         $data['plan'] = Plan::all();
 
         // Display the edit view with the business data and dropdown options
         return view('admin.business.edit', compact('busi'), $data);
     }
    
}
