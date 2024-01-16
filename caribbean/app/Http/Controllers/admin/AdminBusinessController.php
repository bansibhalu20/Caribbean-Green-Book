<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
class AdminBusinessController extends Controller
{
    public function create()
    {
        return view('admin.business.add');
    }
    public function store(Request $request)
    {
        $busi = new Business();
        $busi->name = $request->input('name');
        $busi->save();
    }
}
