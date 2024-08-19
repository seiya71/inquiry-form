@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<div class="login__logo">
    <a class="login__logo-text" href="/login">login</a>
</div>
<div class="register__content">
    <div class="register__heading">
        Register
    </div>
</div>

<div class="register__form">
    <form action="/register" method="POST">
        @csrf
        <div class="register__form-group">
            <label class="form__label" for="name">お名前</label>
            <input class="form__text" type="text" name="name" placeholder="例：山田　太郎" value="{{ old('name') }}" required>
            @error('name')
                <tr>
                    <td>
                        {{$errors->first('name')}}
                    </td>
                </tr>
            @enderror
        </div>

        <div class="register__form-group">
            <label class="form__label" for="email">メールアドレス:</label>
            <input class="form__text" type="email" name="email" placeholder="例: test@example.com"
                value="{{ old('email') }}" required>
            @error('email')
                <tr>
                    <td>
                        {{$errors->first('email')}}
                    </td>
                </tr>
            @enderror
        </div>

        <div class="register__form-group">
            <label class="form__label" for="password">パスワード:</label>
            <input class="form__text" type="password" name="password" placeholder="例: coachtech1106" required>
            @error('password')
                <tr>
                    <td>
                        {{$errors->first('password')}}
                    </td>
                </tr>
            @enderror
        </div>

        <button type="submit" class="register-button">登録</button>
    </form>
</div>

@endsection