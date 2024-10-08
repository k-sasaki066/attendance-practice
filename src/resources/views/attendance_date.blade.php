@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance_date.css') }}">
@endsection

@section('content')
<div class="user-list">
    <form action="/work" method="post" class="user-list__form">
        @csrf
        <div class="user-list__header">
        <button class="date-change__button" name="prevDate"><</button>
        <input type="hidden" name="list_date" value="{{ $list_date }}">
        <p class="user-list__date">{{ $list_date }}</p>
        <button class="date-change__button" name="nextDate">></button>
    </div>
    </form>
    <table class="user-list__table">
        <tr class="user-list__row">
            <th class="user-list__title">名前</th>
            <th class="user-list__title">勤務開始</th>
            <th class="user-list__title">勤務終了</th>
            <th class="user-list__title">休憩時間</th>
            <th class="user-list__title">勤務時間</th>
        </tr>
        @foreach($users as $user)
        <tr class="user-list__row">
            <td class="user-list__item">{{ $user->name }}</td>
            <td class="user-list__item">{{ $user->start_work }}</td>
            <td class="user-list__item">{{ $user->end_work }}</td>
            <td class="user-list__item">{{ $user->rest_time }}</td>
            <td class="user-list__item">{{ $user->work_time }}</td>
        </tr>
        @endforeach
    </table>
    {{ $users->links() }}
</div>
@endsection