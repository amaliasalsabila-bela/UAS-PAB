<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceControllerWeb extends Controller
{
    /**
     * Menampilkan daftar layanan kebersihan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }
    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }
}

