<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\BusinessReview;

class AdminBusinessReviewController extends Controller
{
    public function create()
    {
        return view('admin.business_review.add');
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
            'firstname' => 'nullable|min:2|max:20|string',
            'lastname' => 'nullable|min:2|max:20|string',
            'email' => 'nullable|email',
            'business_id' => 'required|exists:tbl_business_id',
            'star' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);
        $busi_review = new BusinessReview;
        $busi_review->firstname = $request->input('firstname');
        $busi_review->lastname = $request->input('lastname');
        $busi_review->email = $request->input('email');
        $busi_review->business_id = $request->input('business');
        $busi_review->star = $request->input('business_review');
        $busi_review->description = $request->input('description');
        $busi_review->status = $request->input('status');

        $busi_review->save();
        return redirect()->back()->with('success','Inserted Successfully...');


        }catch(\Exception $e)
        {
              // Log the exception with today's date in the daily log channel
              Log::channel('daily')->error('[' . now() . '] ' . $e->getMessage());
              return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
