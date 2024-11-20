<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\SubscriptionModel;
use App\Models\PaymentModel;
use App\Models\SubscriptionHistoryModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\EmailTemplate;
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

            $user = Auth::user();
            $name = strtoupper($user->first_name." ".$user->last_name); 
            $email = $user->email;
            $user_type = strtoupper($user->role); 
            $plan_name = strtoupper($data->title);
            $start_date = date('jS F,Y',strtotime(Carbon::now()));
            $end_date = date('jS F,Y',strtotime($formattedExpiryDate));
          
            $template=EmailTemplate::where(['id'=>6,'status'=>1])->first();
            $template=$template->template;
            $template = str_replace("@NAME@", $name, $template);
            $template = str_replace("@USER_TYPE@", $user_type, $template);
            $template = str_replace("@PLAN_NAME@", $plan_name, $template);
            $template = str_replace("@PRICE@", $price, $template);
            $template = str_replace("@START_DATE@", $start_date, $template);
            $template = str_replace("@END_DATE@", $end_date, $template);
         
            echo $template; die;
            
            $to=$email;
            $subject="RentHub: Subscription";
            Helper::smtp_subscription_email($to,$subject,$template);

            return redirect()->route('vendor-subscription-history')->with('success', 'Payment successful');
            
        } 
    }

    public function cancelPayment(Request $request)
    {
        return redirect()->route('vendor-vendor-list')->with('error', 'Something went wrong');
    }
        
}
