@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Register</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
@endsection
