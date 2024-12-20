<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Booking;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa ulasan
        $booking = Booking::first();  // Mengambil pemesanan pertama

        Review::create([
            'booking_id' => $booking->id,
            'user_id' => $booking->user_id,
            'rating' => 5,  // Rating bintang 5
            'review' => 'Layanan sangat memuaskan, pembersihan dilakukan dengan sangat baik!',
        ]);

        // Mengambil pemesanan kedua untuk review lainnya
        $booking2 = Booking::skip(1)->first();

        Review::create([
            'booking_id' => $booking2->id,
            'user_id' => $booking2->user_id,
            'rating' => 4,  // Rating bintang 4
            'review' => 'Layanan sangat baik, tetapi sedikit keterlambatan.',
        ]);
    }
}

