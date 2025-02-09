<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan
    protected $table = 'reviews';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['booking_id', 'review', 'rating'];

    // Menentukan hubungan dengan model Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

