@extends('layouts.auth')

@section('body')
<div class="position-relative" style="height: 100vh;">
    <!-- Background Image -->
    <img src="{{ asset('img/bg/bg.jpg') }}" class="img-fluid w-100" style="height: 100vh; object-fit: cover;" alt="Background Image">

    <!-- Form Container -->
    <div class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle" style="width: 100%; height: 100%;">
        <div class="p-4 bg-white rounded shadow-lg" style="max-width: 400px;">
            <div class="text-center mb-4">
                <img src="/img/logos/andre.png" class="img-fluid rounded-circle mb-2" width="132" height="132" alt="Logo" />
            </div>
            <form action="/login/auth" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input class="form-control form-control-lg @error('username') is-invalid @enderror" type="text" name="username" placeholder="Masukkan username" required value="{{ old('username') }}" />
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" id="password_form" placeholder="Masukkan password" required />
                        <button id="btnShow" class="btn btn-outline-secondary" type="button" onclick="showPassword()"><i id="btnIcon" class="bi bi-eye"></i></button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mb-2">Masuk</button>
                    <a href="/register" class="btn btn-lg btn-outline-primary w-100">Daftar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    function showPassword() {
        var passwordField = document.getElementById('password_form');
        var icon = document.getElementById('btnIcon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.className = 'bi bi-eye-slash';
        } else {
            passwordField.type = 'password';
            icon.className = 'bi bi-eye';
        }
    }
</script>
@endsection
