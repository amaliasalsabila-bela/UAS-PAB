@extends('layouts.app')

@section('content')
    <h1>Daftar Pemesanan</h1>

    <div class="mb-4">
        <a href="{{ route('bookings.create') }}" class="btn btn-success">Buat Pemesanan Baru</a>
    </div>

    <div class="row">
        @foreach ($bookings as $booking)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pemesan: {{ $booking->user->name }}</h5>
                        <p class="card-text">Layanan: {{ $booking->service->name }}</p>
                        <p class="card-text">Status: {{ ucfirst($booking->status) }}</p>
                        {{-- <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info">Lihat Detail</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
