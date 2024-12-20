<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::create([
            'booking_id' => $request->booking_id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return response()->json($review, 201);
    }
}

