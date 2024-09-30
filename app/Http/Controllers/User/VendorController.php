<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\VendorInfoRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SubscriptionModel;
use App\Models\SubscriptionHistoryModel;

class VendorController extends UserController
{
    /**
     * To handle the request of updating info of a vendor
     * @param VendorInfoRequest $request
     */

    
    public function vendors()
    {
        $data = User::where('role', '=', 'vendor')->get();
        $value = SubscriptionModel::where('status',1)->orderBy('id','desc')->get();
        // $check_vendor_activePlan = SubscriptionHistoryModel::where('vendor_id',Auth::user()->id)->where('status',true)->whereDate("end_date" , '>' , 'date('Y-m-d')')->first();
        return view('backend.vendor.all_vendors', compact('data', 'value'));
    }
    public function updateInfo(VendorInfoRequest $request)
    {
        // validation
        $data = $request->validated();
        $user_detail = User::where('id',Auth::user()->id)->first();
        $user_detail->first_name = $data['name'];
        $user_detail->email = $data['email'];
        $user_detail->phone_number  = $data['phone_number'];
        $user_detail->username  = $data['username'];
        $user_detail->address  = $data['address'];
        $user_detail->update();

        return response(['msg' => "Info is updated successfully"], 200);
     
    }


    /**
     * @param int $userId
     * @param array $data
     * @return bool
     */
    private function updateUserData(int $userId, array $data): bool
    {
        return User::findOrFail($userId)->update($data);
    }

    /**
     * @param int $vendorId
     * @param array $data
     * @return bool
     */
    private function updateShopData(int $vendorId, array $data): bool
    {
        return DB::table('vendor_shop')->where('vendor_id', '=', $vendorId)->update($data);
    }

    /**
     * @param int $userId
     * To return the id of the current user's shop
     */
    public static function getVendorId(int $userId)
    {
        return DB::table('vendor_shop')->where('user_id', $userId)
            ->select('vendor_id')->value('vendor_id');
    }
}
