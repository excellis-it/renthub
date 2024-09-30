<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\SubscriptionModel;
use App\Models\PaymentModel;
use App\Models\SubscriptionHistoryModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Srmklive\PayPal\Services\PayPal as PayPalClient;



class PaypalPaymentController extends Controller
{
    //
    public function createPayment($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $subscription_detail = SubscriptionModel::where('id',$decryptedId)->first();
        session()->put('subscription_detail', $subscription_detail);
        $price = $subscription_detail->price; 
        $formattedPrice = number_format($price, 2, '.', '');
    
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('vendor.paypal-payment.success'),
                "cancel_url" => route('vendor.paypal-payment.cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $formattedPrice
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
    
            return response()->json(['success' => false, 'error' => 'Something went wrong']);
        } else {
            return response()->json(['success' => false, 'error' => 'Something went wrong']);
        }
    }

    public function successPayment(Request $request)
    {
        
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
      
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $data = session()->get('subscription_detail');
            $currentDate = Carbon::now();  
            $expiryDate = $currentDate->addDays($data->days); 
            $formattedExpiryDate = $expiryDate->format('Y-m-d');

            $price = number_format($data->price, 2, '.', '');
            $subscription_hostory = new SubscriptionHistoryModel;
            $subscription_hostory->vendor_id = Auth::user()->id;
            $subscription_hostory->subscription_id = $data->id;
            $subscription_hostory->price = $price;
            $subscription_hostory->days = $data->days;
            $subscription_hostory->status = true;
            $subscription_hostory->start_date = date('Y-m-d');
            $subscription_hostory->end_date = $formattedExpiryDate;
            $subscription_hostory->save();
            
            $purchaseUnits = $response['purchase_units'];
            $purchaseUnit = $purchaseUnits[0];
            $payments = $purchaseUnit['payments']['captures'];
            $capture = $payments[0];

            $payment = new PaymentModel();
            $payment->subscription_history_id = $subscription_hostory->id;
            $payment->transaction_id = $capture['id'];
            $payment->payment_status = 'success';
            $payment->payment_date = date('y-m-d');
            $payment->payment_amount = $price;
            $payment->payment_currency = 'USD';
            $payment->save();

            return redirect()->route('vendor-subscription-history')->with('success', 'Payment successful');
            
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
            
        }
    }

    public function cancelPayment(Request $request)
    {
        return redirect()->route('vendor-vendor-list')->with('error', 'Something went wrong');
    }
        
}
