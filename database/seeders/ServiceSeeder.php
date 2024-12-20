<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa layanan kebersihan
        Service::create([
            'name' => 'Pembersihan Umum',
            'description' => 'Pembersihan dasar untuk rumah atau kantor.',
            'price' => 100000,
        ]);

        Service::create([
            'name' => 'Sanitasi Mendalam',
            'description' => 'Pembersihan mendalam termasuk sanitasi di area sensitif.',
            'price' => 200000,
        ]);

        Service::create([
            'name' => 'Pengangkutan Sampah Besar',
            'description' => 'Pengangkutan sampah besar dari rumah atau kantor.',
            'price' => 300000,
        ]);
    }
}

