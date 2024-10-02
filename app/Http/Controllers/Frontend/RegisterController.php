<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    //
    public function privacy()
    {
        return view('frontend.privacy');
    }
    public function listing_user_register(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => [
                'required',
                'unique:users,username',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^[a-zA-Z0-9_]+$/', $value)) {
                        $fail('The ' . $attribute . ' may only contain letters, numbers, and underscores.');
                    }
                },
            ],
            'title' => 'required',
            'password' => 'required|min:8|confirmed',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'phone_number' => 'required|string|max:15',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'address' => 'required|string|max:255'
        ]);
        $data = [
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'email' => $request->email,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'govt_id_type' => $request->govt_id_type,
            'company_name' => $request->company_name,
            'corporate_id' => $request->corporate_id,
            'tax_id' => $request->tax_id,
            'role' => 'vendor',
            'remember_token' => Str::random(60),

        ];

        if ($request->hasFile('govt_id_file')) {
            $imageName = time() . '.' . $request->govt_id_file->extension();
            $request->govt_id_file->move(public_path('images'), $imageName);
            $data['govt_id_file'] = $imageName;
        }

        $vendor = new User();
        $vendor->fill($data);
        //dd($vendor);
        $vendor->save();
        return response()->json([
            'message' => 'Listing user registration successfully.'
        ]);
    }
    public function basic_user_register(Request $request)
    {
        // return 'hi';
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => [
                'required',
                'unique:users,username',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^[a-zA-Z0-9_]+$/', $value)) {
                        $fail('The ' . $attribute . ' may only contain letters, numbers, and underscores.');
                    }
                },
            ],
            'title' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'phone_number' => 'required|string|max:15',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',


        ]);

        $data = [
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'email' => $request->email,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'password' => bcrypt($request->password),

            'role' => 'user',
            'status' => 1,
            'remember_token' => Str::random(60),

        ];
        $user = new User();
        $user->fill($data);
        //dd($user);
        $user->save();

        return response()->json([
            'message' => 'Basic user registration successfully.'
        ]);
    }
}
