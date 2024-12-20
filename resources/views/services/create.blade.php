@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Layanan Kebersihan</h2>

    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Layanan</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Harga Layanan</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Layanan</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Layanan</button>
    </form>
</div>
@endsection
