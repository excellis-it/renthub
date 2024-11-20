<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\product\ProductModel;
use Illuminate\Support\Facades\Crypt;

class ReviewController extends Controller
{
    public function review(Request $request)
    {

        $data = Crypt::decrypt($request->id);
        return view('frontend.dashboard.review', compact('data'));
    }
    public function reviewstore(Request $request)
    {
        $request->validate([
            'rating_point' => 'required|integer|min:1|max:5',
            'description' => 'required|string|max:255',
            'product_id' => 'required',
            
        ]);

        $product = ProductModel::find($request->product_id);

       //dd($product);
     
        $user = auth()->user();
     $data = [
            'user_id' => $user->id,
            'rating_point' => $request->rating_point,
            'description' => $request->description,
            'vendor_id' => $product->vendor_id,
            'product_id' => $product->product_id,
            'status' => 1
        ];
        $review = new Review();

        $review->fill($data);
        //dd($review);
        $review->save();
        return response()->json(['message' => 'Your review has been submitted successfully!']);
    }
}