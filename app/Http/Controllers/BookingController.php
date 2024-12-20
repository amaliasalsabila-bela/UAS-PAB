<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
        ]);

        $booking = Booking::create([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'status' => 'pending',
        ]);

        return response()->json($booking, 201);
    }

    public function show($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json($booking);
    }

    public function index()
    {
        // Mengambil semua data pemesanan, bersama dengan relasi user dan service
        $bookings = Booking::with(['user', 'service'])->get();

        return response()->json($bookings);
    }
}

