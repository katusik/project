@extends('page.layouts')
@section('title', 'Account')
@section('content')
    <div class="personal-account">
        <div class="avatar-update">
            <div style="display: flex">
                <p><img src="/uploads/avatars/{{ $user->account->avatar ?? 'default.jpg' }}" alt="avatar" class="avatar"></p>
                <div style="margin-top: auto; margin-bottom: 30px;">
                    <form action="{{ route('destroyAvatar', $user->id) }}" method="post">
                        @csrf
                        <button class="btn-delete" type="submit"><img src="{{ asset('image/erase_delete.png') }}" alt="delete" title="Удалить фото" class="erase"></button>
                    </form>
                </div>
            </div>
            <p>
                <label for="file"></label>
                <input type="file" name="avatar" form="form-account" id="file">
            </p>
            @if ($errors->has('avatar'))
                <p class="errors">{{ $errors->first('avatar') }}</p>
            @endif
        </div>
        <div class="personal-data">
            <form id="form-account" action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="personal-update">
                    <label for="name"></label>
                    <input type="text" name="name" value="{{ $user->name ?? ''}}">
                    @if ($errors->has('name'))
                        <p class="errors">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="personal-update{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label for="last_name"></label>
                    <input type="text" name="last_name" value="{!! $user->account->last_name ?? old('last_name') ?? '' !!}" placeholder="Фамилия">

                    @if ($errors->has('last_name'))
                        <p class="errors">{{ $errors->first('last_name') }}</p>
                    @endif
                </div>
                <div class="personal-update{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email"></label>
                    <input type="text" name="email" value="{!! $user->email ?? old('email') ?? '' !!}" placeholder="Email">

                    @if ($errors->has('email'))
                        <p class="errors">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="personal-update">
                    <label for="phone"></label>
                    <input type="text" name="phone" value="{!! $user->account->phone ?? '' !!}" placeholder="Телефон">
                </div>
                <div class="personal-update">
                    @if (isset($user->account->birthday))
                        <div class="birthday">
                            <input type="text" name="day" class="day" value="{!!  date('d', strtotime($user->account->birthday)) ?? '' !!}">
                            <input type="text" name="month" class="month" value="{!! date('m', strtotime($user->account->birthday)) ?? '' !!}">
                            <input type="text" name="year" class="year" value="{!! date('Y', strtotime($user->account->birthday)) ?? '' !!}">
                        </div>
                        @if ($errors->has('birthday'))
                            <p class="errors">{{ $errors->first('birthday') }}</p>
                        @endif

                    @else
                        <div class="birthday">
                            <input type="text" name="day" class="day" placeholder="дд" value="{{ old('day') }}">
                            <input type="text" name="month" class="month" placeholder="мм" value="{{ old('month') }}">
                            <input type="text" name="year" class="year" placeholder="год" value="{{ old('year') }}">
                        </div>
                        @if ($errors->has('birthday'))
                            <p class="errors">{{ $errors->first('birthday') }}</p>
                        @endif
                    @endif
                </div>
                <div class="personal-update">
                    <div class="gender">
                        @foreach($gender as $gen)
                            <input type="radio" name="gender_id" id="{{ $gen->id }}" value="{{ $gen->id }}" {{ $gen->checked ?  'checked' : ''}}>
                            <label for="{{ $gen->id }}">{{ $gen->gender }}</label>
                        @endforeach

                        @if ($errors->has('gender_id'))
                            <p class="errors">{{ $errors->first('gender_id') }}</p>
                        @endif
                    </div>

                </div>
                <input type="submit" value="Изменить">
            </form>
        </div>
    </div>
    <p>
        <a href="{{ route('profile.index') }}">Назад</a>
    </p>



@endsection
