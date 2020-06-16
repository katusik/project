@extends('page.layouts')
@section('title', 'Tour')
@section('content')
    <div class="tour">
        <h3 style="margin: 20px">Новый тур</h3>

        <form action="{{ route('admin-tour.store') }}" method="post">
            @csrf
            <div class="tour-item">
                <div>Название тура</div>
                <div>
                    <input type="text" name="title">
                </div>
            </div>
            <div class="tour-item">
                <div>Описание тура</div>
                <div><textarea name="description"></textarea></div>
            </div>
            <div class="tour-item-select" >
                <div>Тур
                    <select name="type">
                        <option value=""></option>
                        <option value="Автобусный">Автобусный</option>
                        <option value="Автобусный">Авиа</option>
                    </select>
                </div>
                <div>Страна
                    <select name="country">
                        <option value=""></option>
                        @foreach($countries as $country)
                            <option value="{{$country['name']}}">{{$country['name']}}</option>
                        @endforeach
                    </select>

                </div>
                <div>
                    Количество дней
                    <input type="text" name="days">
                </div>
                <div>
                    Стоимость
                    <input type="text" name="price">
                </div>
                <div>
                    Всего мест
                    <input type="text" name="total">
                </div>

            </div>
            <p style="text-align: center; margin-top: 50px"><input type="submit" value="Сохранить"></p>

        </form>


    </div>

@endsection
