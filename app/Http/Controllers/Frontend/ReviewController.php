<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function showReviews(){
        $reviews = Review::with('user','transaction')->get();
        //return $reviews;
        return view('admin.show_review', compact('reviews'));
    }
    public function deleteReview($id){
        $review = Review::find($id);
        $review->delete();
        $notification = array(
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function statusReviews($id){
        $review = Review::find($id);
        if($review->status == 1){
            $review->status = 0;
            $review->save();
        }else{
            $review->status = 1;
            $review->save();
        }
        $notification = array(
            'message' => 'Review Status Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
