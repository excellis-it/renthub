<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\AdminInfoRequest;
use App\Models\User;
use App\MyHelpers;
use App\Notifications\VendorActivated;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\SubscriptionModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

use Illuminate\Support\Facades\Hash;

class AdminController extends UserController
{
    /**
     * Update the info of the admin
     * @param AdminInfoRequest $request
     */

    public function vendors()
    {
        $data = User::where('role', '=', 'vendor')->get();
        return view('backend.admin.all_vendors', compact('data'));
    }


    public function updateInfo(AdminInfoRequest $request)
    {
        $data = $request->validated();
        $user_detail = User::where('id', Auth::user()->id)->first();
        $user_detail->first_name = $data['name'];
        $user_detail->email = $data['email'];
        $user_detail->phone_number  = $data['phone_number'];
        $user_detail->username  = $data['username'];
        $user_detail->address  = $data['address'];
        $user_detail->update();

        return response(['msg' => "Info is updated successfully"], 200);

    }

    public function userRemove(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            MyHelpers::deleteImageFromStorage($user->photo, 'uploads/images/profile/');
            if ($user->delete())
                return redirect()->route('admin-vendor-list')->with('success', 'Successfully removed.');
            else
                return redirect('admin-vendor-list')->with('error', 'Failed to remove this user.');
        } catch (ModelNotFoundException $exception) {
            return redirect('admin-vendor-list')->with('error', 'Failed to remove this user.');
        }
    }

    public function vendorActivate(Request $request)
    {
        $vendor_id = $request->vendor_id;

        // check whether activate or de-activate
        if ($request->current_status == "1") {
            return $this->vendorDeActivate($vendor_id);
        }

        try {
            $vendor = User::findOrFail($vendor_id);
            $vendor->update(['status' => 1]);

            // notify the vendor
            Notification::send($vendor, new VendorActivated());

            return response(['msg' => 'Vendor now is activated.'], 200);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('admin-vendor-list')->with('error', 'Failed to activate this vendor, try again');
        }
    }
    public function vendorDeActivate(int $vendor_id)
    {

        try {
            User::findOrFail($vendor_id)->update(['status' => 0]);
            return response(['msg' => 'Vendor now is disabled.'], 200);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('admin-vendor-list')->with('error', 'Failed to activate this vendor, try again');
        }
    }

    // public function index()
    // {
    //     $data = SubscriptionModel::all();
    //     return view('backend.admin.all_vendors', compact('data'));
    // }

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
    /*public function updatePassword(Request $request)
{
    $request->validate([

        'new_password' => 'required|string|min:8',
        'confirm_password' => 'required|same:new_password',
    ]);

    $user = Auth::user();
    $user->password = bcrypt($request->new_password);
    $user->save();

    return response()->json(['status' => true, 'msg' => 'Password updated successfully'], 200);
    // return response(['msg' => "Password updated successfully"], 200);
}*/
}
