<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailTemplate;
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
            'phone_number' => 'required|numeric|digits:10|regex:/^[0-9\-\(\)\/\+\s]+$/',

            'email' => 'required|string|regex:/^[a-z][\w\-\.]*@([\w\-]+\.)+[\w\-]{2,4}$/|max:255|unique:users,email',

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
            'is_delete'=>1,
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


        /**********************************/
        //Email Template for verification

        /***********************************/

        /*$name=$request->first_name." ".$request->last_name;

        $template=EmailTemplate::where(['id'=>2,'status'=>1])->first();
        $template=$template->template;
        $template = str_replace("@NAME@", $name, $template);
        // echo $template; die;
        $to=$email;
        $subject="RentHub: Confirm Your Registration";
        Helper::smtp_register_email($to,$subject,$template);*/


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
            'phone_number' => 'required|numeric|digits:10|regex:/^[0-9\-\(\)\/\+\s]+$/',
            'email' => 'required|string|regex:/^[a-z][\w\-\.]*@([\w\-]+\.)+[\w\-]{2,4}$/|max:255|unique:users,email',
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
            'is_delete'=>1,
            'remember_token' => Str::random(60),

        ];
        $user = new User();
        $user->fill($data);
        //dd($user);
        $user->save();

           /**********************************/
        //Email Template for verification

        /***********************************/

      /*  $email=$request->email;
        $name=$request->first_name." ".$request->last_name;

        $template=EmailTemplate::where(['id'=>3,'status'=>1])->first();
        $template=$template->template;
        $template = str_replace("@NAME@", $name, $template);
        //echo $template; die;
        $to=$email;
        $subject="RentHub: Confirm Your Registration";
        //Helper::smtp_register_email($to,$subject,$template);*/

        return response()->json([
            'message' => 'Basic user registration successfully.'
        ]);
    }
}
