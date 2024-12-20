@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Beri Ulasan Layanan</h2>

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="booking_id">Booking ID</label>
            <input type="number" class="form-control" id="booking_id" name="booking_id" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label for="comment">Komentar</label>
            <textarea class="form-control" id="comment" name="comment" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
    </form>
</div>
@endsection
