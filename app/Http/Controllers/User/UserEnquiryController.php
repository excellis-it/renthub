<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserEnquiry;

class UserEnquiryController extends Controller
{
    public function list()
    {
        $enquiries = UserEnquiry::where('user_id', auth()->user()->id)->get();
        return view('user.enquiry.list', compact('enquiries'));
    }
    
    public function enquirystore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'interested_in' => 'required',
        ]);

        $enquiry = new UserEnquiry();
        $enquiry->user_id = auth()->user()->id;
        $enquiry->product_id = $request->product_id;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->message = $request->message;
        $enquiry->interested_in = $request->interested_in;
        

        if ($enquiry->save())
            return response(['msg' => 'User Enquiry is added successfully.'], 200);
        else
            return redirect()->route('enquiry')->with('error', 'Failed to add this enquiry, try again.');
    }
}
