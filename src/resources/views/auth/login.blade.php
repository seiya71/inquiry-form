@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="register__logo">
    <a class="register__logo-text" href="{{ url('/register') }}">register</a>
</div>
<div class="login__content">
    <div class="login__heading">
        Login
    </div>
</div>

<div class="login__form">
    <form action="/login" method="POST">
        @csrf
        <div class="login__form-group">
            <label class="login__label" for="email">メールアドレス:</label>
            <input class="login__text" type="email" name="email" placeholder="例: test@example.com"
                value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $messages }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="login__label" for="password">パスワード:</label>
            <input class="login__text" type="password" name="password" placeholder="例: coachtech1106" required>
            @error('password')
                <div class="error">{{ $messages }}</div>
            @enderror
        </div>

        <button type="submit" class="login-button">ログイン</button>
    </form>
</div>

@endsection