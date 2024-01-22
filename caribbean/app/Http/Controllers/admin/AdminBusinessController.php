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
    // Retrieve the business with the given ID
    $busi = Business::find($id);

    // Fetch data for dropdowns: countries, categories, and plans
    $data['countries'] = Country::all();
    $data['categories'] = Category::all();
    $data['plan'] = Plan::all();

    // Display the edit view with the business data and dropdown options
    return view('admin.business.edit', compact('busi'), $data);
}

public function update(Request $request,$id)
{
    $business = Business::find($id);
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
}
