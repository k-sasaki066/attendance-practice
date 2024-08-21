@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-form">
    <form class="register-form__group" action="" method="">
        <div class="register-form__title">
            <span>会員登録</span>
        </div>
        <div class="register-form__item">
            <input class="register-form__item-input"
            type="name" name="name" value="" placeholder="名前">
        </div>
        <div class="register__error-massage">
            <span class="error-massage__text"></span>
        </div>

        <div class="register-form__item">
            <input class="register-form__item-input"
            type="name" name="name" value="" placeholder="メールアドレス">
        </div>
        <div class="register__error-massage">
            <span class="error-massage__text"></span>
        </div>

        <div class="register-form__item">
            <input class="register-form__item-input"
            type="name" name="name" value="" placeholder="パスワード">
        </div>
        <div class="register__error-massage">
            <span class="error-massage__text"></span>
        </div>

        <div class="register-form__item">
            <input class="register-form__item-input"
            type="name" name="name" value="" placeholder="確認用パスワード">
        </div>
        <div class="register__error-massage">
            <span class="error-massage__text"></span>
        </div>

        <div class="register-form__item">
            <button class="register-form__item-submit" type="submit">会員登録</button>
        </div>
        <div class="login-guidance">
            <div class="login-guidance__text">
                <span>アカウントをお持ちでない方はこちらから</span>
            </div>
            <div class="login-guidance__item">
                <a class="login-guidance__link"
                href="">ログイン</a>
            </div>
        </div>
    </form>
</div>

@endsection