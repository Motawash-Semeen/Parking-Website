<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function writeReview($slot_id, $id, Request $request){
        $review = new Review;
        $review->user_id = Auth::user()->id;
        $review->transaction_id = $id;
        $review->slot_id = $slot_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();
        $notification = array(
            'message' => 'Review submitted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->route('dashboard')->with($notification);
    }
    public function getReview($id){
        $review = Review::with('user')->where('slot_id', $id)->get();
        return response()->json(['review' => $review]);
    }
}
