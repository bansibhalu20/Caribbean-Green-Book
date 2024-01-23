<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryReference;

class AdminCountryController extends Controller
{
    public function create()
    {
        $data['countries'] = CountryReference::all();
        return view('admin.country.add',$data);
    }
    public function store(Request $request)
    {

    } 
}
