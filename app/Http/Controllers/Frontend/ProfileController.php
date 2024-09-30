<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentModel;
use App\Models\SubscriptionModel;
use App\Models\SubscriptionHistoryModel;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function user_profile()
    {
        $user = auth()->user();
        // dd($user);
        return view('frontend.dashboard.user-profile', compact('user'));
    }
    public function edit($id)
    {
        $user = auth()->user()->find($id);
        // dd($user);

        return view('frontend.dashboard.profile-edit', compact('user'));
    }

    public function update(Request $request)
    {


        /*
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

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'phone_number' => 'required|string|max:15',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'address' => 'required|string|max:255',

        ]);*/
        $data = [
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
            'industry' => $request->industry

        ];


        $user = User::find($request->id);
        $user->update($data);
        toastr()->success('Profile updated successfully.', ['timeout' => 1000]);
        return redirect('/user-profile');
    }


    public function change_password($id)
    {
        $user = auth()->user()->find($id);
        return view('frontend.dashboard.change-password', compact('user'));
    }
    public function update_password(Request $request)
    {
        $data = [
            


        ];


        $user = User::find($request->id);
        $user->update($data);
        toastr()->success('Change password successfully.', ['timeout' => 1000]);
        return redirect('/user-profile');
    }
    public function payment_history(Request $request)
    {
        $data = PaymentModel::all();
        return view('frontend.dashboard.payment-history', compact('data'));
    }
    public function subscription_history(Request $request)
    {
        $subscription = SubscriptionModel::where(['title' => $request->title, 'subtitle' => $request->title])->first();
        $history = SubscriptionHistoryModel::all();
        return view('frontend.dashboard.subscription-history', compact('subscription', 'history'));
    }
}
