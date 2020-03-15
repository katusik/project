@extends('page.layouts')
@section('title', 'Costumers')
@section('content')

    <div class="customers">
        <h3>Личные данные</h3>

        <form action="{{ route('customers.store') }}" method="post">
            @csrf
            <div class="customers-item">
                <div>
                    Фамилия
                </div>
                <div>
                    <input type="text" name="last_name" value="{{ old('last_name') }}">
                </div>
            </div>
            <div class="customers-item">
                <div>
                    Имя
                </div>
                <div>
                    <input type="text" name="name">
                </div>
            </div>
            <div class="customers-item">
                <div>
                    Отчество
                </div>
                <div>
                    <input type="text" name="patronymic">
                </div>
            </div>
            <div class="customers-item">
                <div>
                    Пол
                </div>
                <div class="gender">
                    @foreach($gender as $gen)

                        <input type="radio" name="gender_id" id="{{ $gen->id }}" value="{{ $gen->id }}" }}>
                        <label for="{{ $gen->id }}">{{ $gen->gender }}</label>
                    @endforeach
                </div>
            </div>
            <div class="customers-item">
                <div>
                    Дата рождения
                </div>
                <div class="birthday">
                    <input type="text" name="day" class="day" placeholder="дд">
                    <input type="text" name="month" class="month" placeholder="мм">
                    <input type="text" name="year" class="year" placeholder="год">
                </div>
            </div>
            <div class="customers-item">
                <div>
                    E-mail
                </div>
                <div>
                    <input type="text" name="email">
                </div>
            </div>
            <div class="customers-item">
                <div>
                    Телефон
                </div>
                <div>
                    <input type="text" name="phone">
                </div>
            </div>
            <div class="customers-item">
                <div>
                    Адресс
                </div>
                <div>
                    <input type="text" name="address">
                </div>
            </div>

            <input type="submit" value="Сохранить">


        </form>

    </div>

@endsection
