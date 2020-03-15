@extends('page.layouts')
@section('title', 'updatePassword')
@section('content')


    <div class="password-update">
        <h3>Смена пароля</h3>
        <form action="{{ route('updatePassword') }}" method="post">
            @csrf
            <div class="personal-update {{ $errors->has('current_password') ? ' has-error' : '' }}">
                <p>Текущий пароль</p>
                <input type="password" name="current_password">
                @if ($errors->has('current_password'))
                    <p class="errors">{{ $errors->first('current_password') }}</p>
                @endif
            </div>
            <div class="personal-update">
                <p>Новый пароль</p>
                <input type="password" name="new_password">
                @if ($errors->has('new_password'))
                    <p class="errors">{{ $errors->first('new_password') }}</p>
                @endif

            </div>
            <div class="personal-update {{ $errors->has('new_confirm_password') ? ' has-error' : '' }}">
                <p>Повторите новый пароль</p>
                <input type="password" name="new_confirm_password">
            </div>

            <input type="submit" value="Сохранить">

        </form>
    </div>







@endsection
