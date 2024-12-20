<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan
    protected $table = 'services';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['name', 'description', 'price'];

    // Menentukan hubungan dengan model Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
