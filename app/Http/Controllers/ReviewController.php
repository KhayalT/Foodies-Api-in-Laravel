<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Restaurant;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index($id)
    {
        $reviews = Restaurant::find($id)->review;
        return ReviewResource::collection($reviews);
    }

    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|min:50|max:510',
            'star' => 'required|min:1|max:5|numeric'
        ]);

        $review = new Review;
        $review->restaurant_id = $request->restaurant_id;
        $review->user_id = Auth::user()->id;
        $review->review = $request->review;
        $review->star = $request->star;
        $review->created_at = now();
        $review->save();
        return new ReviewResource($review);
    }
}
