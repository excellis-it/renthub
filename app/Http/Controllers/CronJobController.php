<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionModel;
use App\Models\SubscriptionHistoryModel;

class CronJobController extends Controller
{
        public function sub_history()
        {
                $subscriptions = SubscriptionHistoryModel::where('status', 1)->get();
                $date = date('Y-m-d');
                $startDate = now();
                
                $deletedProducts = []; 
                foreach ($subscriptions as $val) {
                    if ($val->end_date == $date) {
                        $updated = $val->update(['status' => 0, 'start_date' => $startDate]);

                        if ($updated) {
                            $products = ProductModel::where('subscription_id', $val->id)
                                ->where('vendor_id', $val->vendor_id)
                                ->get();
                               
                
                            
                            $deletedProducts = array_merge($deletedProducts, $products->toArray());
                
                        
                            ProductModel::where('subscription_id', $val->id)
                                ->where('vendor_id', $val->vendor_id)
                                ->delete();
                        }
                    }
                }
                
                // echo "Updated Subscriptions:\n";
                // print_r($subscriptions->where('status', 0)->toArray());
                
                // echo "\nDeleted Products:\n";
                // print_r($deletedProducts);
                
                return;
                
            }

    }
