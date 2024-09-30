<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function listing_user(Request $request){
        $data = User::where('role', 'vendor')
        ->orderBy('id', 'desc')
        ->get();
        return view('backend.User.listing_user',compact('data'));
    }


    public function basic_user(Request $request){
        $data = User::where('role', 'user')
        ->orderBy('id', 'desc')
        ->get();
        return view('backend.User.basic_user',compact('data'));
    }

    public function edit_user($id)
    {
        return view('backend.User.edit_user', ['data' => User::find($id)]);
    }

    public function edit_basic_user($id)
    {
        return view('backend.User.edit_basic_user', ['data' => User::find($id)]);
    }

    public function update_basic_user(Request $request)
    {
        
        // validation
        $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ]);

        // update
        $data = [
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'username' => $request->username,
            'email' => $request->email,
            'govt_id_type' => $request->govt_id_type,
            'company_name' => $request->company_name,
            'corporate_id' => $request->corporate_id,
            'tax_id' => $request->tax_id,
            'status' => $request->status,
        ];

        if ($request->hasFile('govt_id_file')) {
            $imageName = time() . '.' . $request->govt_id_file->extension();
            $request->govt_id_file->move(public_path('images'), $imageName);
            
            // Add the uploaded file name to the data array
            $data['govt_id_file'] = $imageName;
        }
        
        // Update the user record with both the form data and the uploaded file path
        User::where('id', $request->id)->update($data);

        return response()->json(['status' => true, 'message' => 'Basic User updated successfully']);
    }



    public function update_user(Request $request)
    {
        // validation
        $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ]);

        // update
        $data = [
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'username' => $request->username,
            'email' => $request->email,
            'govt_id_type' => $request->govt_id_type,
            'company_name' => $request->company_name,
            'corporate_id' => $request->corporate_id,
            'tax_id' => $request->tax_id,
            'status' => $request->status,
        ];
        
        // Handle file upload for 'govt_id_file'
        if ($request->hasFile('govt_id_file')) {
            $imageName = time() . '.' . $request->govt_id_file->extension();
            $request->govt_id_file->move(public_path('images'), $imageName);
            
            // Add the uploaded file name to the data array
            $data['govt_id_file'] = $imageName;
        }
        
        // Update the user record with both the form data and the uploaded file path
        User::where('id', $request->id)->update($data);

        return response()->json(['status' => true, 'message' => 'Listing User updated successfully']);
    }
}