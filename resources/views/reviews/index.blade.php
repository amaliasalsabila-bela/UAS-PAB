@extends('layouts.app')

@section('content')
    <h1>Ulasan Pengguna</h1>

    <div class="row">
        @foreach ($reviews as $review)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->user->name }} - Rating: {{ $review->rating }} <i
                                class="bi bi-star-fill text-warning"></i></h5>
                        <p class="card-text">{{ $review->comment }}</p>
                        <p class="card-text"><small class="text-muted">Diberikan pada {{ $review->created_at->format('d M Y') }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
