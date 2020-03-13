@extends('page.layouts')
@section('title', 'Account')
@section('content')


    <div class="password-update">
        <h3>Смена пароля</h3>
        <form action="{{ route('manageProfile') }}" method="post">
            @csrf
            <div class="personal-update">
                <p>Текущий пароль</p>
                <input type="password" name="current_password">
            </div>
            <div class="personal-update">
                <p>Новый пароль</p>
                <input type="password" name="new_password">
            </div>
            <div class="personal-update">
                <p>Повторите новый пароль</p>
                <input type="password" name="new_confirm_password">
            </div>
            <p>
                <input type="submit" value="Изменить">
            </p>
        </form>
    </div>

@endsection
