<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\User;
use App\MyHelpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\PaymentModel;
use App\Models\UserEnquiry;
use App\Models\SubscriptionModel;
use App\Models\SubscriptionHistoryModel;



use Illuminate\Support\Facades\URL;

class UserController extends Controller
{

    /**
     * To update the image of an authenticated user ( admin, vendor, or any user )
     * @param Request $request
     */


    /*public function __construct()
    {

    }*/

    public function updateImage(Request $request)
    {
        
        // validate the image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $image = $request->file('image');
        if ($image) {
            // validate the new image
            $allowedExtensions = 'gif,jpg,jpeg,png,svg,webp,ico';
            $data = $request->validate(
                [
                    'image' => ['nullable', 'image', 'mimes:' . $allowedExtensions, 'max:4096']
                ],
                [
                    'image.image' => 'The file must be an image.'
                ]
            );

            // upload it
            $data['photo'] = MyHelpers::uploadImage($image, 'uploads/images/profile');

            // update image in db
            try {
                $user = User::findOrFail(Auth::id())->update($data);
                if ($user) {
                    // remove the old image
                    MyHelpers::deleteImageFromStorage(Auth::user()->photo, 'uploads/images/profile/');
                    toastr()->success('Profile image updated successfully', ['timeout' => 1000]);
                    return redirect()->back();
                    // return response(['msg' => 'Your image is updated successfully'], 200);
                }else{
                    toastr()->error('failed to update the new image');
                    return redirect()->back();
                }
            } catch (ModelNotFoundException $exception) {
                return redirect()->back();
                toastr()->error('failed to update the new image');
                
            }
        }
    }

    /**
     * To update the password of any user.
     * @param Request $request
     */
    public function updatePassword(Request $request)
    {
        // validation
        $validatedData = $request->validate([
            'password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'new_password' => ['required', Password::defaults(), 'different:password'],
            'confirm_password' => ['required', 'same:new_password']
        ]);
        // $data = $request->validate($rules);


        // updating the password
        User::find(Auth::id())->update([
            'password' => bcrypt($validatedData['new_password'])
        ]);
        return response()->json([
            'status' => 1,
            'msg' => 'Password changed successfully.'
        ]);
    }

    public function change_url()
    {
        $url = URL::to('https://www.excellis.co.in/demo/renthub/dev/user/profile');

        // Redirect to the generated URL
        return redirect($url);
    }

    public function user_profile()
    {
        $user = auth()->user();
        $user_enquries = UserEnquiry::where('user_id', auth()->user()->id)
    ->with('product')
    ->get();
        return view('frontend.dashboard.user-profile', compact('user','user_enquries'));
    }
    public function edit($id)
    {
        $user = auth()->user()->find($id);
        // dd($user);

        return view('frontend.dashboard.profile-edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' =>  'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'phone_number' => 'required|string|max:15',

            'address' => 'required|string|max:255',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',

        ]);


        $user = User::find($request->id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'address' => $request->address,

        ]);

        return response()->json([
            'message' => 'Profile updated successfully.'
        ]);
    }


    public function change_password($id)
    {
        $user = auth()->user()->find($id);
        return view('frontend.dashboard.change-password', compact('user'));
    }
    /*public function update_password(Request $request)
    {
        // return 'hi';
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ]);

        $user = Auth::user();

        if (!bcrypt($request->current_password == $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update the user's password
        $user->password = bcrypt($request->new_password);
        $user->save();

        toastr()->success('Password changed successfully.', ['timeout' => 1000]);
        return redirect('/user/profile');
    }*/
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