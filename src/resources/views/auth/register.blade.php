@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-form">
    <form class="register-form__group" action="/register" method="post">
        @csrf
        <div class="register-form__title">
            <span>会員登録</span>
        </div>
        <div class="register-form__item">
            <input class="register-form__item-input"
            type="name" name="name" value="{{ old('name') }}" placeholder="名前">
        </div>
        @error('name')
        <div class="register__error-massage">
            <span class="error-massage__text">{{ $message }}</span>
        </div>
        @enderror
        <div class="register-form__item">
            <input class="register-form__item-input"
            type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
        </div>
        @error('email')
        <div class="register__error-massage">
            <span class="error-massage__text">{{ $message }}</span>
        </div>
        @enderror
        <div class="register-form__item">
            <input class="register-form__item-input"
            type="password" name="password" placeholder="パスワード">
        </div>
        @error('password')
        <div class="register__error-massage">
            <span class="error-massage__text">{{ $message }}</span>
        </div>
        @enderror
        <div class="register-form__item">
            <input class="register-form__item-input"
            type="password" name="password_confirmation" value="" placeholder="確認用パスワード">
        </div>
        @error('password_confirmation')
        <div class="register__error-massage">
            <span class="error-massage__text">{{ $message }}</span>
        </div>
        @enderror

        <div class="register-form__item">
            <button class="register-form__item-submit" type="submit">会員登録</button>
        </div>
        <div class="login-guidance">
            <div class="login-guidance__text">
                <span>アカウントをお持ちでない方はこちらから</span>
            </div>
            <div class="login-guidance__item">
                <a class="login-guidance__link"
                href="/login">ログイン</a>
            </div>
        </div>
    </form>
</div>

@endsection