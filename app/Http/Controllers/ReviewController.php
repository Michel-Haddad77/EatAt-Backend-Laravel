<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    //Add a review (post)
    public function addReview(Request $request){

        $new_review = new Review;
        $new_review->review = $request->review;
        $new_review->rating = $request->rating;
        $new_review->user_id = $request->user_id;
        $new_review->restaurant_id = $request->resto_id;
        $new_review->is_pending = 1; //review is pending by default
        $new_review->save();
        
        return response()->json([
            "status" => "Success",
        ], 200);
        
    }

    //Delete review
    public function deleteReview(Request $request){
        $user_id = $request->user_id;
        $resto_id = $request->resto_id;

        Review::where('user_id',$user_id)->where('restaurant_id',$resto_id)->delete();

        return response()->json([
            "status" => "Success",
        ], 200);

    }

    //confirm a review
    public function confirmReview(Request $request){
        $user_id = $request->user_id;
        $resto_id = $request->resto_id;

        Review::where('user_id',$user_id)->where('restaurant_id',$resto_id)->update(array('is_pending'=>0));

        return response()->json([
            "status" => "Success",
        ], 200);

    }

    //get all reviews of a specific resto
    public function restoReviews($resto_id){
        $reviews = Review::join('users', 'users.id', '=', 'reviews.user_id')
                           ->where('restaurant_id',$resto_id)->where('is_pending',0)
                           ->get(['reviews.review','reviews.rating','users.fname','users.lname','users.picture']);

        return response()->json([
            "status" => "Success",
            "results" => $reviews,
        ], 200);
    }

    //get all the reivews
    public function getAllReviews(){
        $reviews = Review::join('users', 'users.id', '=', 'reviews.user_id')
                            ->get(['reviews.review','reviews.rating','users.fname','users.lname','users.picture']);

        return response()->json([
            "status" => "Success",
            "results" => $reviews,
        ], 200);

    }

}
