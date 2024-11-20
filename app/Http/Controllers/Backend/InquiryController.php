<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Models\UserEnquiry;


use Illuminate\Support\Facades\Crypt;

class InquiryController extends Controller
{
    //

    public function property_list()
    {
        $cat_id = 1;
        $vendorId=auth()->id();
        //dd($vendorId);
        $role = auth()->user()->role; 

        if ($role == 'admin') {
          
            $user_property_enquries = UserEnquiry::with('product')
                ->whereHas('product', function ($query) use ($cat_id) {
                    $query->where('category_id', $cat_id);
                })
                ->paginate(10);
        } else {
           
            $user_property_enquries = UserEnquiry::with('product')
                ->whereHas('product', function ($query) use ($cat_id, $vendorId) {
                    $query->where('category_id', $cat_id)
                        ->where('vendor_id', $vendorId); 
                })
                ->paginate(10);
        }

        return view('backend.inquiries.property_list',compact('user_property_enquries'));
    }

    public function property_filter(Request $request)
    {
        
        $cat_id = 1;
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            
            $user_property_enquries = UserEnquiry::with('product', 'user')
                ->whereHas('product', function ($productQuery) use ($cat_id, $query) {
                    $productQuery->where('category_id', $cat_id)
                        ->where(function ($productSubQuery) use ($query) {
                            $productSubQuery->where('product_name', 'like', '%' . $query . '%')
                                ->orWhere('marked_price', 'like', '%' . $query . '%');
                        });
                })
                ->whereHas('user', function ($userQuery) use ($query) {
                    $userQuery->where(function ($userSubQuery) use ($query) {
                        $userSubQuery->where('first_name', 'like', '%' . $query . '%')
                            ->orWhere('last_name', 'like', '%' . $query . '%')
                            ->orWhere('email', 'like', '%' . $query . '%')
                            ->orWhere('phone_number', 'like', '%' . $query . '%');
                    });
                })
                ->where(function ($mainQuery) use ($query) {
                    $mainQuery->where('message', 'like', '%' . $query . '%')
                        ->orWhere('tour_date', 'like', '%' . $query . '%');
                })
                ->paginate(10);
           
                    
            return response()->json(['data' => view('backend.inquiries.property_filter', compact('user_property_enquries'))->render()]);
        }
        
    }

    public function machinery_list(Request $request)
    {
        $cat_id = 2;
        $vendorId = auth()->id(); 
        $role = auth()->user()->role; 

        if ($role == 'admin') {
          
            $user_machinery_enquries = UserEnquiry::with('product')
                ->whereHas('product', function ($query) use ($cat_id) {
                    $query->where('category_id', $cat_id);
                })
                ->paginate(10);
        } else {
           
            $user_machinery_enquries = UserEnquiry::with('product')
                ->whereHas('product', function ($query) use ($cat_id, $vendorId) {
                    $query->where('category_id', $cat_id)
                        ->where('vendor_id', $vendorId); 
                })
                ->paginate(10);
        }

        return view('backend.inquiries.machinery_list', compact('user_machinery_enquries'));
    }

    public function machinery_filter(Request $request)
    {
            
        $cat_id = 2;
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            
            $user_machinery_enquries = UserEnquiry::with('product', 'user')
                ->whereHas('product', function ($productQuery) use ($cat_id, $query) {
                    $productQuery->where('category_id', $cat_id)
                        ->where(function ($productSubQuery) use ($query) {
                            $productSubQuery->where('product_name', 'like', '%' . $query . '%')
                                ->orWhere('marked_price', 'like', '%' . $query . '%');
                        });
                })
                ->whereHas('user', function ($userQuery) use ($query) {
                    $userQuery->where(function ($userSubQuery) use ($query) {
                        $userSubQuery->where('first_name', 'like', '%' . $query . '%')
                            ->orWhere('last_name', 'like', '%' . $query . '%')
                            ->orWhere('email', 'like', '%' . $query . '%')
                            ->orWhere('phone_number', 'like', '%' . $query . '%');
                    });
                })
                ->where(function ($mainQuery) use ($query) {
                    $mainQuery->where('message', 'like', '%' . $query . '%')
                        ->orWhere('tour_date', 'like', '%' . $query . '%');
                })
                ->paginate(10);
        
                    
            return response()->json(['data' => view('backend.inquiries.machinery_filter', compact('user_machinery_enquries'))->render()]);
        }
    }

    public function vehicle_list()
    {
        $cat_id = 4;
        $vendorId=auth()->id();
        $role = auth()->user()->role; 

        if ($role == 'admin') {
          
            $user_vehicle_enquries = UserEnquiry::with('product')
                ->whereHas('product', function ($query) use ($cat_id) {
                    $query->where('category_id', $cat_id);
                })
                ->paginate(10);
        } else {
           
            $user_vehicle_enquries = UserEnquiry::with('product')
                ->whereHas('product', function ($query) use ($cat_id, $vendorId) {
                    $query->where('category_id', $cat_id)
                        ->where('vendor_id', $vendorId); 
                })
                ->paginate(10);
        }

        return view('backend.inquiries.vehicle_list',compact('user_vehicle_enquries'));
    }

    public function vehicle_filter(Request $request)
    {
            
        $cat_id = 4;
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            
            $user_vehicle_enquries = UserEnquiry::with('product', 'user')
                ->whereHas('product', function ($productQuery) use ($cat_id, $query) {
                    $productQuery->where('category_id', $cat_id)
                        ->where(function ($productSubQuery) use ($query) {
                            $productSubQuery->where('product_name', 'like', '%' . $query . '%')
                                ->orWhere('marked_price', 'like', '%' . $query . '%');
                        });
                })
                ->whereHas('user', function ($userQuery) use ($query) {
                    $userQuery->where(function ($userSubQuery) use ($query) {
                        $userSubQuery->where('first_name', 'like', '%' . $query . '%')
                            ->orWhere('last_name', 'like', '%' . $query . '%')
                            ->orWhere('email', 'like', '%' . $query . '%')
                            ->orWhere('phone_number', 'like', '%' . $query . '%');
                    });
                })
                ->where(function ($mainQuery) use ($query) {
                    $mainQuery->where('message', 'like', '%' . $query . '%')
                        ->orWhere('tour_date', 'like', '%' . $query . '%');
                })
                ->paginate(10);
            
                    
            return response()->json(['data' => view('backend.inquiries.vehicle_filter', compact('user_vehicle_enquries'))->render()]);
        }
    }

    public function electronics_list(Request $request)
    {
        $cat_id = 3;
        $vendorId=auth()->id();
        $role = auth()->user()->role; 

        if ($role == 'admin') {
          
            $user_electronics_enquries = UserEnquiry::with('product')
                ->whereHas('product', function ($query) use ($cat_id) {
                    $query->where('category_id', $cat_id);
                })
                ->paginate(10);
        } else {
           
            $user_electronics_enquries = UserEnquiry::with('product')
                ->whereHas('product', function ($query) use ($cat_id, $vendorId) {
                    $query->where('category_id', $cat_id)
                        ->where('vendor_id', $vendorId); 
                })
                ->paginate(10);
        }

        return view('backend.inquiries.electronics_list',compact('user_electronics_enquries'));
    }

    public function electronics_filter(Request $request)
    {
                
        $cat_id = 3;
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            
            $user_electronics_enquries = UserEnquiry::with('product', 'user')
                ->whereHas('product', function ($productQuery) use ($cat_id, $query) {
                    $productQuery->where('category_id', $cat_id)
                        ->where(function ($productSubQuery) use ($query) {
                            $productSubQuery->where('product_name', 'like', '%' . $query . '%')
                                ->orWhere('marked_price', 'like', '%' . $query . '%');
                        });
                })
                ->whereHas('user', function ($userQuery) use ($query) {
                    $userQuery->where(function ($userSubQuery) use ($query) {
                        $userSubQuery->where('first_name', 'like', '%' . $query . '%')
                            ->orWhere('last_name', 'like', '%' . $query . '%')
                            ->orWhere('email', 'like', '%' . $query . '%')
                            ->orWhere('phone_number', 'like', '%' . $query . '%');
                    });
                })
                ->where(function ($mainQuery) use ($query) {
                    $mainQuery->where('message', 'like', '%' . $query . '%')
                        ->orWhere('tour_date', 'like', '%' . $query . '%');
                })
                ->paginate(10);
            
                    
            return response()->json(['data' => view('backend.inquiries.electronics_filter', compact('user_electronics_enquries'))->render()]);
        }
    }
}
