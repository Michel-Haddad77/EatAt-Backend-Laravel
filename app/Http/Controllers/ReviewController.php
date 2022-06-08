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
        $new_review->is_pending = 1;
        $new_review->save();
        
        return response()->json([
            "status" => "Success",
        ], 200);
        
    }
}
