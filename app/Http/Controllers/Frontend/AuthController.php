<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailTemplate;
use App\Notifications\UserLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\bcrypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;



use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function view()
    {
        return view('backend.admin.login');
    }

    public function show()
    {
        return view('frontend.login');
    }

                        /************* Forgot Password *******************/

    public function create()
    {
        return view('auth.forgot.forgot-password');
    }

                        /************* Reset Password *******************/

    public function reset_password(Request $request)
    {
        $token= $request->token;
        $user = User::where(['status'=>1,'remember_token'=>$token])->first();
        //dd($user);
        if($user) {
            return view('auth.forgot.reset-password', ['token' => $token]);
        }else{
            return redirect('forgot-password')->with('error', 'Sorry, we are unable to find you!!');
        }
    }

                    /*********************  Login *****************************/

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'password' => 'required|min:8',
        ]);

        $isEmail = filter_var($request->username, FILTER_VALIDATE_EMAIL);
        $credentials = [
            'password' => $request->password,
        ];

        $user = $isEmail
            ? User::where('email', $request->username)->first()
            : User::where('username', $request->username)->first();

        if (!$user) {
            return redirect()->back()->with('username_error', 'Username or email not found.')->withInput($request->except('password'));
        }

        $credentials[$isEmail ? 'email' : 'username'] = $request->username;
        if (!Auth::attempt($credentials)) {
            return redirect()->back()->with('password_error', 'Incorrect password.')->withInput($request->except('password'));
        }

        Auth::login($user); // Log the user in

        if ($user->role == 'vendor') {

            return redirect('/vendor/profile')->with('success', 'Welcome to ' .$user->first_name.' '.$user->last_name. ' profile!');
        } elseif ($user->role == 'user') {

            return redirect('/user/profile')->with('success', 'Welcome to ' .$user->first_name.' '.$user->last_name. ' profile!');
        } else {
            return redirect()->back()->with('username_error', 'Username not found.')->withInput($request->except('password'));
        }
    }

                    /********************* Admin Login *****************************/

    public function admin_login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('username', 'password');
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return redirect()->back()->with('username_error', 'Username not found.')->withInput($request->except('password'));
        }

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->with('password_error', 'Incorrect password.')->withInput($request->except('password'));
        }

        if ($user->role == 'admin') {
            Auth::login($user);
            return redirect('/admin/profile')->with('success', 'Welcome to ' .$user->first_name.' '.$user->last_name. ' profile!');
        } else {
            return redirect()->back()->with('username_error', 'Username not found.')->withInput($request->except('password'));
        }

    }

    public function destroy(Request $request)
    {
        $user = Auth::guard('web')->user();


        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($user->role == 'admin') {
            return redirect('/admin-login');
        } else {
            return redirect('/login');
        }
    }
    /**************************************/

                //Forget Password
    /*************************************/

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;

        $user = User::where(['email'=> $email,'status'=>1])->first();
        if($user){
            $token = Str::random(60);
            $user->remember_token = $token;
            $user->password=null;
            $user->save();
        $name=$user->first_name." ".$user->last_name;
        $reset_link = url('reset-password/' . $token);

        $template=EmailTemplate::where(['id'=>1,'status'=>1])->first();
        $template=$template->template;
        $template = str_replace("@NAME@", $name, $template);
        $template = str_replace("@RESET_LINK@", $reset_link, $template);
       // echo $template; die;
        $to=$email;
        $subject="RentHub: Forget Password";
        Helper::smtp_send_email($to,$subject,$template);


            return redirect()->back()->with('success', 'A reset link has been sent to your email address!');
        }else{
            return redirect()->back()->with('error', 'Unable to send reset link. Please try again.');
        }

       return redirect()->route('password_update');
    }


    /*********************************/

            //Reset Password
    /*********************************/


    public function updatePassword(Request $request)
    {

        $request->validate([
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|same:new_password',
            'token' => 'required',
        ]);

        $user = User::where(['remember_token' => $request->token, 'status' => 1])->first();

        if ($user) {
            $user->password = bcrypt($request->new_password);
            $user->remember_token = null;
            $user->save();
            return redirect()->route('login')->with('success', 'Password successfully been updated!');
        } else {
            return redirect()->back()->with('error', 'Invalid token or user not found.');
        }
    }

}
