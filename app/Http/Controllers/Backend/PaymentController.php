<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentModel;
use App\Models\SubscriptionModel;
use App\Models\SubscriptionHistoryModel;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment_index($id)
    {
        // dd($data);
        return view('backend.subscription.payment', compact('id'));
    }
    public function payment_create(Request $request)
    {
        $data = [
            'card_holder' => $request->card_holder,
            'card_number' => $request->card_number,
            'expiry_date' => $request->expiry_date,
            'cvv' => $request->cvv,

        ];
        $vendorId = auth()->id();
        // echo $vendorId;
        // die;
        $id = $request->id;
        // echo $sid;
        // die;
        $sub = new SubscriptionHistoryModel();
        // echo $id;
        // die;
        $sub->vendor_id = $vendorId;

        $subscription = SubscriptionModel::where('id', $id)->first();
        // echo $subscription;
        // die;
        $sub->subscription_id = $subscription->id;
        $sub->price = $subscription->price;
        $days = (int)$subscription->days;
        $startDate = now();
        $endDate = $startDate->copy()->addDays($days);
        $sub->days = $days;
        $sub->start_date = $startDate->format('Y-m-d');
        $sub->end_date = $endDate->format('Y-m-d');
        $sub->save();

        $pay = new PaymentModel();
        $pay->subscription_history_id = $id;
        $pay->fill($data);
        // dd($pay);
        $pay->save();

        toastr()->success('Vendor subscribed successfully', ['timeout' => 1000]);
        return redirect()->route('vendor-vendor-list');
    }
}
