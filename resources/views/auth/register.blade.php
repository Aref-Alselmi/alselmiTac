@extends('layouts.site')

@section('title', 'Register')

@section('content')
<div class="container auth-box">

    <h1>Create Account</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn-submit">Register</button>

        <p class="auth-link">
            Already registered?
            <a href="{{ route('login') }}">Login</a>
        </p>
    </form>

</div>
@endsection
