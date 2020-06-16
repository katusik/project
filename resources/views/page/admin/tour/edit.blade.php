@extends('page.layouts')
@section('title', 'Tour')
@section('content')

    <div class="tour">

        <h4 style="text-align: center; margin: 50px 0">Изменить информацию о туре</h4>

        <form action="" method="post">
            @method('put')
            @csrf
            <div class="tour-item">
                <div>Название тура</div>
                <div>
                    <input type="text" name="title" value="{{ $tour->title }}">
                </div>
            </div>
            <div class="tour-item">
                <div>Описание тура</div>
                <div><textarea name="description">{{ $tour->description }}</textarea></div>
            </div>
            <div class="tour-item-select" >
                <div>Тур
                    <input type="text" name="type" value="{{ $tour->type }}">
                </div>
                <div>Страна

                    <input type="text" name="country" value="{{ $tour->country }}" >

                </div>
                <div>
                    Количество дней
                    <input type="text" name="days" value="{{ $tour->days }}">
                </div>
                <div>
                    Стоимость
                    <input type="text" name="price" value="{{ $tour->price }}">
                </div>

            </div>

            <p style="text-align: center; margin-top: 50px"><input type="submit" value="Сохранить"></p>

            <div><a href="{{ route('admin-tour.index') }}">Назад</a></div>

        </form>


    </div>

@endsection


