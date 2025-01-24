<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product\ProductModel;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /*******************************/
    //Listing User listing page
    /******************************/

    public function listing_user(Request $request)
    {
        $data = User::where('role', 'vendor')
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('backend.User.listing_user', compact('data'));
    }

    /*******************************/
    //Listing User Change Password
    /******************************/

    public function list_change_password(Request $request)
    {
        $id = $request->id;
        return view('backend.User.change_password_list', ['data' => $id]);
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

            // Retrieve the user by ID
            $user = User::find($request->id);

            $user->password = bcrypt($request->new_password);
            $user->save();

            // Redirect with success message
            toastr()->success('Listing User password updated successfully');
            return response()->json(['status' => true, 'message' => 'Listing User password updated successfully']);

        }



    /*******************************/
    //Listing User delete page
    /******************************/

    public function remove_listing_user(Request $request)
    {
        $id = $request->id;
        $data = User::findOrFail($id);
        //dd($data);

        //     $data->delete();
        $data->update([
            'status' => 0,
            'is_delete' => 0
        ]);
        ProductModel::where('vendor_id', $id)->update(['product_status' => 0]);
        return redirect()->back()->with('success', 'Listing User deleted successfully');
    }

    /*******************************/
    //Basic User listing page
    /******************************/

    public function basic_user(Request $request)
    {
        $data = User::where('role', 'user')
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('backend.User.basic_user', compact('data'));
    }

    /*******************************/
    //Basic User delete page
    /******************************/

    public function remove_basic_user(Request $request)
    {
        $id = $request->id;
        $data = User::findOrFail($id);
        //dd($data);

        //$data->delete();
        $data->update([
            'status' => 0,
            'is_delete' => 0
        ]);

        return redirect()->back()->with('success', 'Listing User deleted successfully');
    }

    /*******************************/
    //Listing User Edit page
    /******************************/

    public function edit_user($id)
    {
        return view('backend.User.edit_user', ['data' => User::find($id)]);
    }

    /*******************************/
    //Basic User Edit page
    /******************************/

    public function edit_basic_user($id)
    {

        return view('backend.User.edit_basic_user', ['data' => User::find($id)]);
    }


     /*******************************/
    //Basic User Change Password
    /******************************/

    public function basic_user_change_password(Request $request)
    {
        $id = $request->id;
        return view('backend.User.basic_user_change', ['data' => $id]);
    }
    public function store_basic_user(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

            // Retrieve the user by ID
            $user = User::find($request->id);

            $user->password = bcrypt($request->new_password);
            $user->save();

            // Redirect with success message
            toastr()->success('Basic User password updated successfully');
            return response()->json(['status' => true, 'message' => 'Basic User password updated successfully']);

        }

    /*******************************/
    //Listing User Update page
    /******************************/

    public function update_user(Request $request)
    {
        // validation
        $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone_number'=>'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip_code' => 'required|numeric',
            'state' =>'required',
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
            'is_delete' => 1,
        ];

        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/images/profile'), $imageName);

            // Add the uploaded file name to the data array
            $data['photo'] = $imageName;
        }
        // Handle file upload for 'govt_id_file'
        if ($request->hasFile('govt_id_file')) {
            $imageName = time() . '.' . $request->govt_id_file->extension();
            $request->govt_id_file->move(public_path('images'), $imageName);

            // Add the uploaded file name to the data array
            $data['govt_id_file'] = $imageName;
        }
        // dd($data);
        // Update the user record with both the form data and the uploaded file path
        User::where('id', $request->id)->update($data);

        toastr()->success('Listing User updated successfully');
        return response()->json(['status' => true, 'success' => 'Listing User updated successfully']);
    }

    /*******************************/
    //Basic User update page
    /******************************/

    public function update_basic_user(Request $request)
    {

        // validation
        $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone_number'=>'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip_code' => 'required|numeric',
            'state'=>'required',


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
            'is_delete' => 1,
        ];
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/images/profile'), $imageName);

            // Add the uploaded file name to the data array
            $data['photo'] = $imageName;
        }

        if ($request->hasFile('govt_id_file')) {
            $imageName = time() . '.' . $request->govt_id_file->extension();
            $request->govt_id_file->move(public_path('images'), $imageName);

            // Add the uploaded file name to the data array
            $data['govt_id_file'] = $imageName;
        }

        // dd($data);
        // Update the user record with both the form data and the uploaded file path
        User::where('id', $request->id)->update($data);
        toastr()->success('Basic User updated successfully');
        return response()->json(['status' => true, 'success' => 'Basic User updated successfully']);
    }
}
