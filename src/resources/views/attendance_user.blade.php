@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance_user.css') }}">
@endsection

@section('content')
<div class="user-list">
    <div class="user-list__header">
        <p class="user-list__text">User一覧</p>
        <p class="user-list__date">{{ $list_date }}現在</p>
    </div>
    <table class="user-list__table">
        <tr class="user-list__row">
            <th class="user-list__title">No.</th>
            <th class="user-list__title">ID</th>
            <th class="user-list__title">名前</th>
            <th class="user-list__title">E-mail</th>
            <th class="user-list__title">勤務状態</th>
        </tr>
        @php
            $list_item =($users->currentPage()-1)*$users->perPage()+1;
        @endphp
        @foreach($users as $user)
            <tr class="user-list__row">
                <td class="user-list__item">{{ $list_item }}</td>
                <td class="user-list__item">{{ $user->id }}</td>
                <td class="user-list__item">{{ $user->name }}</td>
                <td class="user-list__item">{{ $user->email }}</td>
                @if($user->status == 1)
                    <td class="user-list__item">勤務中</td>
                @elseif($user->status == 2)
                    <td class="user-list__item">休憩中</td>
                @elseif($user->status == 3)
                    <td class="user-list__item">退勤</td>
                @else
                    <td class="user-list__item">その他</td>
                @endif
            </tr>
            @php
                $list_item+=1;
            @endphp
        @endforeach
    </table>
    {{ $users->links() }}
</div>

@endsection