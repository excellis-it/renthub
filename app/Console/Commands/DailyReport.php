<?php

namespace App\Console\Commands;

use App\Helpers\Helper;
use Illuminate\Console\Command;
use App\Models\SubscriptionHistoryModel;
use App\Models\product\ProductModel;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Auth;


class DailyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:report';

    /**
     * The console command description.
     *
     * @var string
     */
    public function __construct()
    {
        parent::__construct();
    }
    protected $description = 'Generate daily report';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Request $request)
    {
       
        $data = SubscriptionHistoryModel::where(['status'=>1])->get();
        $today = date('Y-m-d');


        foreach ($data as $val) {
            
            if ($val->end_date == $today) {                
                SubscriptionHistoryModel::where(['id'=>$val->id])->update(['status'=>0]);
               
            }
        }

        $activeProd = ProductModel::where(['product_status' => 1])->get();

        foreach ($activeProd as $product) {

            $count = SubscriptionHistoryModel::where('vendor_id', $product->vendor_id)
                ->where('status', 1) 
                ->count();
    
            
            if ($count == 0) {
                ProductModel::where('vendor_id', $product->vendor_id)
                    ->update(['product_status' => 0]);
            }
        }

        $product = ProductModel::with('user')->first(); 
        $name = $product->user->first_name." ".$product->user->last_name;
        $email=$request->email;
        $template=EmailTemplate::where(['id'=>7,'status'=>1])->first();
        $template=$template->template;
        $template = str_replace("@NAME@", $name, $template);
     
         //echo $template; die;
        
        $to=$email;
        $subject="RentHub: Subscription Expiry";
        //Helper::smtp_subscription_expiry($to,$subject,$template);
        \Log::info('Subscriptions expire'.$template);

    
        return;
    }
    
}
