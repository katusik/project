@extends('page.layouts')
@section('title', 'Costumer')
@section('content')
    <h3 style="margin: 20px">Клиенты</h3>
    <div class="customers">
        <h4>Добавить клиента</h4>
        <div class="tabs">
            <div class="tab">
                <input type="radio" id="tab1" name="tab-group" checked class="tab-input">
                <label for="tab1" class="tab-title"><h5>Личные данные</h5></label>
                <section class="tab-content">
                    <form action="{{ route('customers.store') }}" method="post" id="form-costumer">
                        @csrf
                        <div class="customers-item">
                            <div>
                                Фамилия:
                            </div>
                            <div class="{{ $errors->has('last_name') ? 'has-error' : '' }}">
                                <input type="text" name="last_name" value="{{ old('last_name') }}"
                                       placeholder="{{($errors->has('last_name')) ?  $errors->first('last_name') : ''}}">
                            </div>

                        </div>
                        <div class="customers-item">
                            <div>
                                Имя:
                            </div>
                            <div class="{{ $errors->has('name') ? 'has-error' : '' }}">
                                <input type="text" name="name" value="{{ old('name') }}"
                                       placeholder="{{($errors->has('name')) ?  $errors->first('name') : ''}}">
                            </div>
                        </div>
                        <div class="customers-item">
                            <div>
                                Отчество:
                            </div>
                            <div class="{{ $errors->has('patronymic') ? 'has-error' : '' }}">
                                <input type="text" name="patronymic" value="{{ old('patronymic') }}"
                                       placeholder="{{($errors->has('patronymic')) ?  $errors->first('patronymic') : ''}}">
                            </div>
                        </div>
                        <div class="customers-item">
                            <div style="width: 50%">
                                <span style="margin-right: 30px">Пол:</span>
                                @foreach($gender as $gen)
                                    <input type="radio" name="gender_id" id="{{ $gen->id }}" value="{{ $gen->id }}" }} style="width: auto;">
                                    <label for="{{ $gen->id }}" style="margin-right: 10px">{{ $gen->gender }}</label>
                                @endforeach
                                @if ($errors->has('gender_id'))
                                    <p class="errors">{{ $errors->first('gender_id') }}</p>
                                @endif
                            </div>
                            <div class="birthday" style="text-align: end">
                                <span style="margin-right: 20px">
                                    Дата рождения:
                                </span>
                                <input type="text" name="birthday" placeholder="01-05-1990" style="width:40%"
                                       class="{{ $errors->has('birthday') ? 'has-error' : '' }}" value="{{ old('birthday') }}">
                                @if ($errors->has('birthday'))
                                    <p class="errors">{{ $errors->first('birthday') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="phone" style="margin: 10px 0">
                            <div style="width: 30%">Телефон:</div>
                            <div class="{{ $errors->has('phone') ? 'has-error' : '' }}" style="width: 70%">
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <p class="errors">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="customers-item">
                            <div class="{{ $errors->has('email') ? 'has-error' : '' }}">E-mail:</div>
                            <div>
                                <input type="text" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <p class="errors">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="customers-item">
                            <div>
                                Адрес:
                            </div>
                            <div>
                                <input type="text" name="address" value="{{ old('address') }}">
                            </div>
                        </div>
                        <div class="customers-item">
                            <div>
                                Комментарий:
                            </div>
                            <div>
                                <textarea name="comment" form="form-costumer" rows="2">{{ old('comment') }}</textarea>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <div class="tab">
                <input type="radio" id="tab2" name="tab-group" class="tab-input">
                <label for="tab2" class="tab-title"><h5>Паспортные данные</h5></label>
                <section class="tab-content">
                    <div class="customers-item">
                        <div>
                            Серия и номер паспорта:
                        </div>
                        <div>
                            <input type="text" name="series" form="form-costumer" value="{{old('series')}}">
                        </div>
                    </div>
                    <div class="customers-item">
                        <div>
                            Кем и когда выдан:
                        </div>
                        <div>
                            <input type="text" name="issue" form="form-costumer" value="{{ old('issue') }}">
                        </div>
                    </div>
                    <div class="customers-item">
                        <div>
                            Действителен до:
                        </div>
                        <div class="{{ $errors->has('expire') ? 'has-error' : '' }}">
                            <input type="text" name="expire" placeholder="01-01-2025" form="form-costumer" value="{{ old('expire') }}">
                        </div>
                    </div>
                    @if ($errors->has('series'))
                        <p class="errors">{{ $errors->first('series') }}</p>
                    @endif

                </section>

            </div>
        </div>


        <p style="position: relative; top: 50vh; text-align: end">
            <input type="submit" value="Сохранить" form="form-costumer">

        </p>
    </div>





@endsection
