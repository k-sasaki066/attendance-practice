@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
@if(session('message'))
<div class="login__alert">
    {{ session('message') }}
</div>
@endif

<div class="login-form">
    <form class="login-form__group" action="/login" method="post">
        @csrf
        <div class="login-form__title">
            <span>ログイン</span>
        </div>
        <div class="login-form__item">
            <input class="login-form__item-input"
            type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
        </div>
        @error('email')
        <div class="login__error-massage">
            <span class="error-massage__text">{{ $message }}</span>
        </div>
        @enderror


        <div class="login-form__item">
            <input class="login-form__item-input"
            type="password" name="password" placeholder="パスワード">
        </div>
        @error('password')
        <div class="login__error-massage">
            <span class="error-massage__text">{{ $message }}</span>
        </div>
        @enderror
        <div class="login-form__item">
            <button class="login-form__item-submit" type="submit">ログイン</button>
        </div>

        <div class="register-guidance">
            <div class="register-guidance__text">
                <span>アカウントをお持ちでない方はこちらから</span>
            </div>
            <div class="register-guidance__item">
                <a class="register-guidance__link"
                href="/register">会員登録</a>
            </div>
        </div>
    </form>
</div>
@endsection