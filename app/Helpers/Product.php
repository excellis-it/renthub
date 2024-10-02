<?php

namespace App\Helpers;
use App\Models\product\ProductModel;
use App\Models\UserEnquiry;


class Product {

    public static function product($userId)
    {
        $properties = UserEnquiry::where('user_id', auth()->user()->id)
        ->with('product')
        ->whereHas('product', function ($query) {
            $query->where('category_id', 1);
        })
        ->get();
        $machineries = UserEnquiry::where('user_id', auth()->user()->id)
        ->with('product')
        ->whereHas('product', function ($query) {
            $query->where('category_id', 2);
        })
        ->get();

        $electronics = UserEnquiry::where('user_id', auth()->user()->id)
        ->with('product')
        ->whereHas('product', function ($query) {
            $query->where('category_id', 3);
        })
        ->get();

        $vehicles = UserEnquiry::where('user_id', auth()->user()->id)
        ->with('product')
        ->whereHas('product', function ($query) {
            $query->where('category_id', 4);
        })
        ->get();

        return [
            'properties' => $properties,
            'machineries' => $machineries,
            'electronics' => $electronics,
            'vehicles' => $vehicles
        ];
        
    }
    

    public static function adminWallet()
    {
        $admin_wallet = auth()->user()->wallet_balance;
        $admin_wallet_formatted = $admin_wallet ? number_format($admin_wallet, 2, '.', '') : '0.00';
        return $admin_wallet_formatted;
    }

    public static function affiliatorWallet($id)
    {
        $affiliator_wallet = auth()->user()->wallet_balance;
        $affiliate_wallet_formatted = $affiliator_wallet ? number_format($affiliator_wallet, 2, '.', '') : '0.00';
        return $affiliate_wallet_formatted;
    }

    public  static function userTotalEnquiry($userId)
    {
        $total_enquiry = UserEnquiry::where('user_id', $userId)->count();
        return $total_enquiry;
    }

}
