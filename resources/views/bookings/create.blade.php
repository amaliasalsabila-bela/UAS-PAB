@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Pemesanan Layanan Kebersihan</h2>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User ID</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $usr)
                    <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="service_id">Layanan</label>
            <select class="form-control" id="service_id" name="service_id" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Buat Pemesanan</button>
    </form>
</div>
@endsection
