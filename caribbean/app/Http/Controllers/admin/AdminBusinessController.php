<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Country;
use App\Models\Category;
use App\Models\Plan;
class AdminBusinessController extends Controller
{
    public function create()
    {
        $data['name']=Country::all();
        $data['category']=Category::all();
        $data['plan']=Plan::all();
        return view('admin.business.add',$data);
    }
    public function store(Request $request)
    {
        $business = new Business();
        $business->name = $request->input('name');
        $business->email = $request->input('email');
        $business->website = $request->input('site');
        $business->business_owner_name = $request->input('business_owner_name');
        $business->phone = $request->input('phone1');
        $business->phone2 = $request->input('phone2');
        $business->zipcode = $request->input('zip_code');
        $business->address = $request->input('address');
        $business->how_old_ur_business = $request->input('how_old_ur_business');
        $business->description = $request->input('description');
        $business->hear_about_us = $request->input('about_us');
        $business->image = $request->input('image');
        $business->category_id = $request->input('category');   
        $business->plan_id = $request->input('plan');
        $business->business_industry = $request->input('business_industry');
        $business->is_felony = $request->input('is_felony');
        $business->country_id = $request->input('country');
        $business->state = $request->input('state');
        $business->city = $request->input('city');  
        $business->save();
    }

    public function show()
    {
        $businesses = Business::join('tbl_country', 'tbl_country.id', '=', 'tbl_business.country_id')
            ->select('tbl_business.*', 'tbl_country.name as country_name')
            ->get();
    
        return view('admin.business.view', compact('businesses'));
    }
    
}
