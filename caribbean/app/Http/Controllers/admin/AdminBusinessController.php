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
use Illuminate\Support\Facades\Log;
use DataTables;
class AdminBusinessController extends Controller
{
   /**
 * Display the form to create a new business.
 *
 * Author: Bansi
 *
 * This method is responsible for rendering the view that contains a form
 * allowing the user to submit data for creating a new business. It fetches
 * necessary data such as countries, categories, and plans for dropdowns
 * and passes them to the view. The submitted data will be used to store
 * a new business record in the database.
 *
 * @param  \Illuminate\Http\Request  $request The request object containing the submitted data.
 * @return \Illuminate\Http\Response Returns the view with the necessary data for form creation.
 */
public function create()
{
    // Fetch data for dropdowns: countries, categories, and plans
    $data['name'] = Country::all();
    $data['category'] = Category::all();
    $data['plan'] = Plan::all();
    
    return view('admin.business.add', $data);
}

  /**
 * Store a new business in the database.
 *
 * Author: Bansi
 *
 * This method handles the process of storing a new business record in the database.
 * It utilizes the data submitted through the request object to create a new instance
 * of the Business model. Input values are assigned to the corresponding attributes,
 * and file upload for the business image is handled. After successfully saving the
 * business to the database, the method redirects to the business view page.
 *
 * @param  \Illuminate\Http\Request  $request The request object containing the submitted data.
 * @return \Illuminate\Http\RedirectResponse Redirects to the business view page after storing the business.
 */
public function store(Request $request)
{
    try
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

        // Show success message
        Alert::success('Success', 'Business inserted successfully');

        // Redirect to the business view page after successfully storing the business
        return redirect()->route('admin.business-show')->with('success', 'Business inserted successfully');
    }catch(\Exception $e)
    {
        // Log the exception with today's date in the daily log channel
        Log::channel('daily')->error('[' . now() . '] ' . $e->getMessage());
        return redirect()->back()->with('error', $e->getMessage()); 
    }

}


  
  /**
 * Display a list of businesses.
 *
 * Author: Bansi
 *
 * This method retrieves a list of businesses from the database, including associated
 * country names. It performs a join operation between the 'tbl_business' and 'tbl_country'
 * tables to fetch the necessary data. The result is a collection of businesses with additional
 * information about the country they belong to. This data is then passed to the 'admin.business.view'
 * view for rendering.
 *
 * @return \Illuminate\View\View Returns the view with the list of businesses and associated country names.
 */
public function show()
{
    // Retrieve businesses with associated country names
    $businesses = Business::join('tbl_country', 'tbl_country.id', '=', 'tbl_business.country_id')
        ->select('tbl_business.*', 'tbl_country.name as country_name')
        ->get();

    // Display the view with the list of businesses
    return view('admin.business.view', compact('businesses'));
}
    /**
 * Display the form to edit a specific business.
 *
 * Author: Bansi
 *
 * This method retrieves the business with the given ID from the database
 * and displays the edit view. It fetches additional data for dropdowns such as
 * countries, categories, and plans, which is passed to the view along with the
 * business data. Users can edit the details of the selected business using the
 * form presented in the view.
 *
 * @param  int  $id The ID of the business to be edited.
 * @return \Illuminate\View\View Returns the edit view with the business data and dropdown options.
 */
public function edit($id)
{
    try {
        // Retrieve the business with the given ID
        $busi = Business::find($id);

        // Fetch data for dropdowns: countries, categories, and plans
        $data['countries'] = Country::all();
        $data['categories'] = Category::all();
        $data['plan'] = Plan::all();

        // Display the edit view with the business data and dropdown options
        return view('admin.business.edit', compact('busi'), $data);
    }catch(\Exception $e)
    {
        // Log the exception with today's date in the daily log channel
        Log::channel('daily')->error('[' . now() . '] ' . $e->getMessage());
        return redirect()->back()->with('error', $e->getMessage()); 
    }
}

public function update(Request $request, $id)
{
    try
    {
        $business = Business::findOrFail($id);
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
            // Unlink the old image if it exists
            $oldImage = $business->image;
            if (!empty($oldImage) && Storage::disk('public')->exists('business_image/' . $oldImage)) {
                Storage::disk('public')->delete('business_image/' . $oldImage);
            }

            //store new image
            $file = $request->file('image');
            $fileName = 'admin/business_image/' . $file->getClientOriginalName();
            // Move the uploaded file to the public disk
            $file->storeAs('public', $fileName);
            // Update the image attribute with the file path
            $business->image = $fileName;
        }

        // Save the business to the database
        $business->save();

        // Show success message
        Alert::success('Success', 'Business updated successfully');

        // Redirect to the business view page after successfully storing the business
        return redirect()->route('admin.business-show')->with('success', 'Business updated successfully');
    }
    catch(\Exception $e)
    {
        // Log the exception with today's date in the daily log channel
        Log::channel('daily')->error('[' . now() . '] ' . $e->getMessage());
        return redirect()->back()->with('error', $e->getMessage()); 
    }
}

public function dataTable(Request $request)
{
    if ($request->ajax())
    {
        // Retrieve all user records
        $data = Business::all();

        return DataTables::of($data)
        ->addColumn('country_name', function ($business) {
            // Map user's country name or provide a default value
            if ($business->country) {
                return $business->country->name;
            } else {
                return 'null'; // Or any other default value you prefer
            }
        })
        ->addColumn('image', function ($user) {
            // Generate profile image URL or return null
            if ($business->image) {
                return asset('storage/app/public/business_image/' . $business->image);
            } else {
                return null;
            }
        })
        ->toJson();
    }
}
public function delete($id)
{
    try{
        $business = Business::find($id);

        if(!$business){
            return redirect()->back()->with('error','Category not found');
        }
        if ($business->image) {
            $imagePath = public_path('admin/business_image/') . $business->image;

            if (file_exists($imagePath)) {
                // Delete the image file
                unlink($imagePath);
            }
        }
        $business->delete();
        return redirect()->back()->with('success','Business deleted successfully...');
    }catch(\Exception $e)
    {
          // Handle the exception
          return redirect()->back()->with("error",$e->getMessage());
    }
    
}

}
