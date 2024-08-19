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
            @if ($errors->has('email'))
                <tr>
                    <td>
                        {{$errors->first('email')}}
                    </td>
                </tr>
            @endif
        </div>

        <div class="form-group">
            <label class="login__label" for="password">パスワード:</label>
            <input class="login__text" type="password" name="password" placeholder="例: coachtech1106" required>
            @if ($errors->has('password'))
                <tr>
                    <td>
                        {{$errors->first('password')}}
                    </td>
                </tr>
            @endif
        </div>

        <button type="submit" class="login-button">ログイン</button>
    </form>
</div>

@endsection