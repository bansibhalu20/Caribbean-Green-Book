<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
/* Define Models */
use App\Models\Admin;


class AdminLoginController extends Controller
{
    public function loginPage()
    {
        return view('admin.login.login');
    }
    public function login(Request $request)
    {
        try
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $credentials = $request->only('email','password');

            // Use the admin guard for authentication
            if(Auth::guard('admin')->attempt($credentials)){

                // Authentication successful

                //store admin ID in the session
                session(['admin_id' => Auth::guard('admin')->user()->id]);

                return redirect()->route('adminDashboard');
            }

            // Incorrect email or  password
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }catch (ValidationException $e) 
        {
            return redirect()->route('admin.login')->withErrors($e->errors())->withInput();
        }
    }
   
}
