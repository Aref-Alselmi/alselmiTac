@extends('layouts.site')

@section('title', 'Login')

@section('content')
<br>
<br>
<br>
<div class="container auth-box">

    <h1>Login</h1>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="remember">
                Remember me
            </label>
        </div>

        <button type="submit" class="btn-submit">Login</button>

        <div class="auth-links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            @endif
            <br>
            <a href="{{ route('register') }}">Create new account</a>
        </div>
    </form>

</div>
@endsection
