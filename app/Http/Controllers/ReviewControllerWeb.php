<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Booking;

class ReviewControllerWeb extends Controller
{
    /**
     * Menyimpan review untuk pemesanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string',
        ]);

        Review::create([
            'booking_id' => $request->booking_id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.index');
    }

    /**
     * Menampilkan daftar review.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Anda bisa menambahkan logika untuk mengambil booking yang valid, jika perlu
        return view('reviews.create');
    }
    public function index()
    {
        // Mengambil semua review beserta data user dan booking yang berelasi
        $reviews = Review::with(['user', 'booking', 'booking.service'])->get();

        return view('reviews.index', compact('reviews'));
    }
}

