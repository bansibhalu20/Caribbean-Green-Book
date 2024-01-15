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

            // Additional checks before attempting to log in
            $user = Admin::where('email', $credentials['email'])->first();
            // dd($user);
            if(!$user)
            {
                throw ValidationException::withMessages([
                    'email'=>[trans('auth.failed')],
                ]);
            }

            // Use password_verify to check the hashed password
            if (password_verify($credentials['password'], $user->password)) {
                // Authentication successful
                Auth::login($user);
                return redirect()->route('adminDashboard');
            }

            // Incorrect password
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }catch (ValidationException $e) 
        {
            return redirect()->route('admin.login')->withErrors($e->errors())->withInput();
        }
    }
    public function showProfile()
    {
        return view('admin.showProfile');
    }
}
