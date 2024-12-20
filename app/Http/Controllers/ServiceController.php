<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Menampilkan daftar layanan kebersihan yang tersedia.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua layanan dan mengembalikannya sebagai response JSON
        return response()->json(Service::all());
    }

    /**
     * Menyimpan layanan kebersihan baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Menyimpan data layanan baru ke dalam database
        $service = Service::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        // Mengembalikan response JSON dengan status sukses dan data layanan yang baru disimpan
        return response()->json([
            'message' => 'Layanan berhasil ditambahkan.',
            'data' => $service,
        ], 201);
    }
}

