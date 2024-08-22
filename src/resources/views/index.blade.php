@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
@if(session('message'))
<div class="login__message">
    {{ session('message') }}
</div>
@endif
<div class="attendance-header">
    <p class="attendance-header__title">
        {{ Auth::user()->name }}さんお疲れ様です！！
    </p>
</div>
<div class="attendance-form">
    <form class="attendance-form__group"
    action="/attendance" method="post">
    @csrf
        <div class="attendance-form__item">
            @if($status == 0)
            <button class="attendance-form__submit" type="submit" name="start_work">勤務開始</button>
            @else
            <button class="attendance-form__submit" type="submit" name="start_work" disabled>勤務開始</button>
            @endif
        </div>
        
        <div class="attendance-form__item">
            @if($status == 1)
            <button class="attendance-form__submit" type="submit" name="end_work">勤務終了</button>
            @else
            <button class="attendance-form__submit" type="submit" name="end_work" disabled>勤務終了</button>
            @endif
        </div>

        <div class="attendance-form__item">
            @if($status == 1)
            <button class="attendance-form__submit" type="submit" name="start_rest">休憩開始</button>
            @else
            <button class="attendance-form__submit" type="submit" name="start_rest" disabled>休憩開始</button>
            @endif
        </div>
        <div class="attendance-form__item">
            @if($status == 2)
            <button class="attendance-form__submit" type="submit" name="end_rest">休憩終了</button>
            @else
            <button class="attendance-form__submit" type="submit" name="end_rest" disabled>休憩終了</button>
            @endif
        </div>
    </form>
</div>
@endsection