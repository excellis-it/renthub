<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionModel;
use App\Models\SubscriptionHistoryModel;

class CronJobController extends Controller
{
    // public function sub_history()
    // {
    //     $subscriptions = SubscriptionHistoryModel::where('status', 1)->get();
    //     //dd($subscriptions);
    //     $date = date('Y-m-d');
    //     $startDate = now();
       
    
    //     foreach ($subscriptions as $val) {
    //         if ($val->end_date == $date) {
    //             $val->update(['status' => 0, 'start_date' => $startDate]);
    
    //             if ($val->status == 0) {
                    
    //                 ProductModel::where('subscription_id', $val->id)
    //                     ->where('vendor_id', $val->vendor_id)
    //                     ->delete();
    //             }
    //         }
    //     }
    //     return response()->json(['message' => 'Subscription history updated successfully']);
    // }
}
