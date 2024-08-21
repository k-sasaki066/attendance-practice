@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login__alert">
    <div class="login__alert--danger">
        <ul>
            <li>ログインに失敗しました</li>
        </ul>
    </div>
</div>

<div class="login-form">
    <form class="login-form__group" action="" method="">
        <div class="login-form__title">
            <span>ログイン</span>
        </div>
        <div class="login-form__item">
            <input class="login-form__item-input"
            type="email" name="" value="" placeholder="メールアドレス">
        </div>
        <!-- <div class="login__error-massage">
            <span class="error-massage__text">エラー</span>
        </div> -->

        <div class="login-form__item">
            <input class="login-form__item-input"
            type="password" name="" value="" placeholder="パスワード">
        </div>
        <div class="login__error-massage">
            <span class="error-massage__text"></span>
        </div>

        <div class="login-form__item">
            <button class="login-form__item-submit" type="submit">ログイン</button>
        </div>

        <div class="register-guidance">
            <div class="register-guidance__text">
                <span>アカウントをお持ちでない方はこちらから</span>
            </div>
            <div class="register-guidance__item">
                <a class="register-guidance__link"
                href="">会員登録</a>
            </div>
        </div>
    </form>
</div>
@endsection