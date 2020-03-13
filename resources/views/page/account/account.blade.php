@extends('page.layouts')
@section('title', 'Account')
@section('content')
    <div class="personal-account">
        <div class="avatar-update">
            <div class="avatar-item">
                <p><img src="/uploads/avatars/{{ $user->account->avatar ?? 'default.jpg'}}" alt="avatar" class="avatar"></p>
            </div>
        </div>
        <h2>{{$user->name}}</h2>
        <div class="personal-data">

            <h2>Личные данные</h2>
            <div class="personal-item">
                {{ $user->name }} {{ $user->account->last_name ?? '' }}
                <hr>
            </div>
            <div class="personal-item">
                {!! $account->gender->gender ??  '<span>Пол не выбран</span>' !!}
                <hr>
            </div>
            <div class="personal-item">

                {!! $birthday ?? '<span>Дата рождения</span>' !!}
                <hr>
            </div>
            <div class="personal-item">
                {!! $user->account->phone ?? '<span>Телефон</span>' !!}
                <hr>
            </div>

            <p>
                <a href="{{ route('profile.edit', $user->id) }}">Изменить</a>
            </p>
            <div class="personal-item">
                <h2>Управление профилем</h2>
                <span>Пароль</span>
                <hr>
            </div>
            <div class="personal-item">
                {!! $user->email ??  '' !!}
                <hr>
            </div>
            <p>
                <a href="{{ route('manage') }}">Изменить</a>
            </p>
        </div>
    </div>






@endsection
