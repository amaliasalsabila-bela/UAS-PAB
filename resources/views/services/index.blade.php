@extends('layouts.app')

@section('content')
    <h1>Layanan Kebersihan</h1>

    <div class="mb-4">
        <a href="{{ route('services.create') }}" class="btn btn-success">Tambah Layanan</a>
    </div>

    <div class="row">
        @foreach ($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    {{-- <img src="{{ $service->image_url }}" class="card-img-top" alt="{{ $service->name }}"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">{{ Str::limit($service->description, 100) }}</p>
                        {{-- <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary">Lihat Detail</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
