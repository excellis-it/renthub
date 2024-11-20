<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserEnquiry;
use App\Models\EmailTemplate;
use App\Models\CategoryModel;
use App\Models\product\ProductModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;

class UserEnquiryController extends Controller
{
    public function list()
    {
        $enquiries = UserEnquiry::where('user_id', auth()->user()->id)->get();
        return view('user.enquiry.list', compact('enquiries'));
    }
    
    public function enquirystore(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'interested_in' => 'required',
        ]);
        $product_id = decrypt($request->product_id);
       
        $enquiry = new UserEnquiry();
        $enquiry->user_id = auth()->user()->id;
        $enquiry->product_id = $product_id;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->message = $request->message;
        $enquiry->interested_in = $request->interested_in;
        $enquiry->save();

        $product = ProductModel::where(['product_id'=>$product_id,'product_status'=>1])->first();

        $category = CategoryModel::where(['category_status' => 1, 'category_id' => $product->category_id])->first();   
        
        $name=$request->name;
        $phone = $request->phone;
        $email=$request->email;
        $product_name = $product->product_name; 
        $category_name =$category->category_name;       
        $message = $request->message;
        $interest = $request->interested_in;
        $template=EmailTemplate::where(['id'=>5,'status'=>1])->first();
        $template=$template->template;
        $template = str_replace("@NAME@", $name, $template);
        $template = str_replace("@PRODUCT_NAME@", $product_name, $template);
        $template = str_replace("@PHONE@", $phone, $template);
        $template = str_replace("@CATEGORY@", $category_name, $template);
        $template = str_replace("@EMAIL@", $email, $template);
        $template = str_replace("@MESSAGE@", $message, $template);
        $template = str_replace("@INTEREST@", $interest, $template);
         echo $template; die;
        
        $to=$email;
        $subject="RentHub: Inquiry";
        Helper::smtp_inquiry_email($to,$subject,$template);
        return response(['status' => true,'msg' => 'User Enquiry is added successfully.'], 200);
       
       
    }

    public function enquiry_products($id)
    {
        $cat_id = $id;
        $user = auth()->user();
        $user_property_enquries = UserEnquiry::where('user_id', $user->id)
            ->with('product')
            ->whereHas('product', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            })
            ->paginate(10);

        return view('frontend.dashboard.property-enquiry', compact('user','user_property_enquries','cat_id'));
    }
 
    public function enquiry_products_filter(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $user = auth()->user();
            $cat_id = 1;
           $user_property_enquries = UserEnquiry::where('user_id', $user->id)
         ->with('product')
         ->whereHas('product', function ($queryBuilder) use ($cat_id, $query) {
             $queryBuilder->where('category_id', $cat_id)
                 ->where(function ($nestedQuery) use ($query) {
                     $nestedQuery->where('product_name', 'like', '%' . $query . '%')
                         ->orWhere('location', 'like', '%' . $query . '%')
                         ->orWhere('product_price', 'like', '%' . $query . '%');
                 });
         })
         ->orderBy('product_id', 'desc')
         ->paginate(10);

         
    
            return response()->json(['data' => view('frontend.dashboard.property-enquiry-filter', compact('user_property_enquries','user'))->render()]);
        }
    }

    public function delete_enquiry(Request $request)
    {
        $enquiry = UserEnquiry::find($request->id);
        if ($enquiry->delete()){
            return response()->json(['msg' => 'User Enquiry is deleted successfully.', 'status' => true], 200);
        }else{
            return response()->json(['msg' => 'Failed to delete this enquiry, try again.', 'status' => false], 400);
        }
    }

    public function enquiry_machinery($id)
    {
        $cat_id = $id;
        $user = auth()->user();
        $user_machinery_enquries = UserEnquiry::where('user_id', $user->id)
            ->with('product')
            ->whereHas('product', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            })
            ->paginate(10);

        return view('frontend.dashboard.machinery-enquiry', compact('user','user_machinery_enquries'));
    }

    public function enquiry_machinery_filter(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $user = auth()->user();
            $cat_id = 2;
           $user_machinery_enquries = UserEnquiry::where('user_id', $user->id)
         ->with('product')
         ->whereHas('product', function ($queryBuilder) use ($cat_id, $query) {
             $queryBuilder->where('category_id', $cat_id)
                 ->where(function ($nestedQuery) use ($query) {
                     $nestedQuery->where('product_name', 'like', '%' . $query . '%')
                         ->orWhere('product_price', 'like', '%' . $query . '%');
                 });
         })
         ->orderBy('product_id', 'desc')
         ->paginate(10);

         
    
            return response()->json(['data' => view('frontend.dashboard.machinery-enquiry-filter', compact('user_machinery_enquries','user'))->render()]);
        }
    }
    public function enquiry_electronics($id)
    {
        $cat_id = $id;
        $user = auth()->user();
        $user_electronics_enquries = UserEnquiry::where('user_id', $user->id)
            ->with('product')
            ->whereHas('product', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            })
            ->paginate(10);

        return view('frontend.dashboard.electronics-enquiry', compact('user','user_electronics_enquries'));
    }

    public function enquiry_electronics_filter(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $user = auth()->user();
            $cat_id = 3;
           $user_electronics_enquries = UserEnquiry::where('user_id', $user->id)
         ->with('product')
         ->whereHas('product', function ($queryBuilder) use ($cat_id, $query) {
             $queryBuilder->where('category_id', $cat_id)
                 ->where(function ($nestedQuery) use ($query) {
                     $nestedQuery->where('product_name', 'like', '%' . $query . '%')
                         ->orWhere('product_price', 'like', '%' . $query . '%');
                 });
         })
         ->orderBy('product_id', 'desc')
         ->paginate(10);

         
    
            return response()->json(['data' => view('frontend.dashboard.electronics-enquiry-filter', compact('user_electronics_enquries','user'))->render()]);
        }
    }

    public function enquiry_vehicles($id)
    {
        $cat_id = $id;
        $user = auth()->user();
        $user_vehicles_enquries = UserEnquiry::where('user_id', $user->id)
            ->with('product')
            ->whereHas('product', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            })
            ->paginate(10);

        return view('frontend.dashboard.vehicles-enquiry', compact('user','user_vehicles_enquries'));
    }

    public function enquiry_vehicles_filter(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $user = auth()->user();
            $cat_id = 4;
           $user_vehicles_enquries = UserEnquiry::where('user_id', $user->id)
         ->with('product')
         ->whereHas('product', function ($queryBuilder) use ($cat_id, $query) {
             $queryBuilder->where('category_id', $cat_id)
                 ->where(function ($nestedQuery) use ($query) {
                     $nestedQuery->where('product_name', 'like', '%' . $query . '%')
                         ->orWhere('product_price', 'like', '%' . $query . '%');
                 });
         })
         ->orderBy('product_id', 'desc')
         ->paginate(10);

         
    
            return response()->json(['data' => view('frontend.dashboard.vehicles-enquiry-filter', compact('user_vehicles_enquries','user'))->render()]);
        }
    }

    public function check_enquire(Request $request)
    {
        $check_user_already_enquired = UserEnquiry::where('user_id', auth()->user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($check_user_already_enquired) {
            return response(['status' => false, 'msg' => 'You have already enquired for this product.'], 200);
        } else {
            return response(['status' => true], 200);
        }
    }
}
