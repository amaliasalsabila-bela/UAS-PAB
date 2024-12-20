<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Service;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa pemesanan
        $user = User::first();  // Mengambil user pertama (John Doe)
        $service = Service::first();  // Mengambil layanan pertama (Pembersihan Umum)

        Booking::create([
            'user_id' => $user->id,
            'service_id' => $service->id,
            'status' => 'pending',
            'booking_date' => Carbon::now()->addDays(3),  // Pemesanan 3 hari ke depan
        ]);

        $service2 = Service::skip(1)->first();  // Layanan kedua (Sanitasi Mendalam)

        Booking::create([
            'user_id' => $user->id,
            'service_id' => $service2->id,
            'status' => 'completed',
            'booking_date' => Carbon::now()->addDays(5),  // Pemesanan 5 hari ke depan
        ]);
    }
}

