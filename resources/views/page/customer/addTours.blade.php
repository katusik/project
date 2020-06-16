@extends('page.layouts')
@section('title', 'AddTours')
@section('content')
    <div class="tour">

        Клиент <h3>{{ $customer->last_name }} {{ substr($customer->name, 0, 2) }} . {{ substr($customer->patronymic, 0, 2) }}.</h3>

        <table class="table">
            <thead class="thead">
            <tr>
                <th></th>
                <th>Id</th>
                <th>Название тура</th>
                <th>Цена($)</th>
                <th>Всего / Свободно</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tours as $tour)
                <tr>
                    <td><input type="checkbox" name="selectTour[]" form="selectTour" value="{{ $tour->id }}"></td>
                    <td>{{ $tour->id }}</td>
                    <td>{{ $tour->title}}</td>
                    <td>{{ $tour->price}}</td>
                    <td>{{ $tour->total}} /@if (($tour->total) == count($tour->customer ))
                            <span style="color: #EAA4A4">Мест нет</span>
                        @else <b>{{ ($tour->total) - count($tour->customer ) }}</b>
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <form action="{{ route('addTour') }}" method="post" id="selectTour">
            @csrf
            <input type="submit" value="Добавить" class="btn btn-success" >
        </form>


    </div>

@endsection
