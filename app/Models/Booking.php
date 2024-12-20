<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan
    protected $table = 'bookings';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['user_id', 'service_id', 'status'];

    // Menentukan hubungan dengan model Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Menentukan hubungan dengan model Review
    public function review()
    {
        return $this->hasOne(Review::class);
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

