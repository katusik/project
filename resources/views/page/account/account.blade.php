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

            <h3>Личные данные</h3>
            <div class="personal-item">
                {{ $user->name }} {{ $user->account->last_name ?? '' }}
                <hr>
            </div>
            <div class="personal-item">
                {{ $user->email }}
                <hr>
            </div>
            <div class="personal-item">
                {!! $account->gender->gender ??  '<span>Пол не выбран</span>' !!}
                <hr>
            </div>
            <div class="personal-item">

                {!! (isset($user->account->birthday)) ? date('d-m-Y', strtotime($user->account->birthday)) : '<span>Дата рождения</span>' !!}
                <hr>
            </div>
            <div class="personal-item">
                {!! $user->account->phone ?? '<span>Телефон</span>' !!}
                <hr>
            </div>

            <p style="text-align: end">
                <a href="{{ route('profile.edit', $user->id) }}">Изменить</a>
            </p>
            <div class="personal-item" style="margin-top: 30px">
                <h3>Изменить пароль</h3>
                <div style="display: flex; justify-content: space-between">
                    <span>Пароль</span>
                    <a href="{{ route('editPassword') }}"><img src="{{ asset('image/edit.png') }}" alt="edit" width="20" title="Изменить пароль"></a>
                </div>
                <hr>
            </div>
        </div>

    </div>

@endsection
