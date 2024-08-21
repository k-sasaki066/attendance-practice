@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance-header">
    <p class="attendance-header__title">
        {{ Auth::user()->name }}さんお疲れ様です！！
    </p>
</div>
<div class="attendance-form">
    <form class="attendance-form__group"
    action="" method="">
        <div class="attendance-form__item">
            <button class="attendance-form__submit" type="submit" name="start_work">勤務開始</button>
        </div>
        <div class="attendance-form__item">
            <button class="attendance-form__submit" type="submit" name="end_work">勤務終了</button>
        </div>
        <div class="attendance-form__item">
            <button class="attendance-form__submit" type="submit" name="start_rest">休憩開始</button>
        </div>
        <div class="attendance-form__item">
            <button class="attendance-form__submit" type="submit" name="end_rest">休憩終了</button>
        </div>
    </form>
</div>
@endsection