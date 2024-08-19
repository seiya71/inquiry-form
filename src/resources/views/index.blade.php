@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="contacts/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}" />
                </div>
                <div class="form__error">
                    @error('last_name')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}" />
                </div>
                <div class="form__error">
                    @error('first_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <label class="gender__label">
                        <input type="radio" name="gender" value="1" checked />
                        男性
                    </label>
                    <label class="gender__label">
                        <input type="radio" name="gender" value="2" />
                        女性
                    </label>
                    <label class="gender__label">
                        <input type="radio" name="gender" value="3" />
                        その他
                    </label>
                </div>
                <div class="form__error">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input--text">
                <input type="tel" name="tell-1" placeholder="080" maxlength="5" value="{{ old('tell-1') }}" />
                <span class="hyphen">-</span>
                <input type="tel" name="tell-2" placeholder="1234" maxlength="5" value="{{ old('tell-2') }}" />
                <span class="hyphen">-</span>
                <input type="tel" name="tell-3" placeholder="5678" maxlength="5" value="{{ old('tell-3') }}" />
            </div>
            <div class="form__error">
                @error('tell-1')
                    {{ $message }}
                @enderror
                @error('tell-2')
                    {{ $message }}
                @enderror
                @error('tell-3')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <select class="form-control">
                <option value="" selected>選択してください</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="form__error">
                @error('categories')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection