<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;

class BookingControllerWeb extends Controller
{
    /**
     * Menampilkan form pemesanan.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $services = Service::all();
        $users = User::all();

        return view('bookings.create', compact('services','users'));
    }

    /**
     * Menyimpan pemesanan baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
        ]);

        Booking::create([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index');
    }

    /**
     * Menampilkan daftar pemesanan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }
}

