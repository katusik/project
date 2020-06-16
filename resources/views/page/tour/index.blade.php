@extends('page.layouts')
@section('title', 'Tours')
@section('content')
    <div class="tour">
        <h2>Туры</h2>

        <table class="table">
            <thead class="thead">
            <tr>
                <th>Id</th>
                <th>Название тура</th>
                <th>Цена($)</th>
                <th>Всего / Свободно</th>
                <th>+</th>

            </tr>
            </thead>
            <tbody>
            @foreach($tours as $tour)
                <tr>
                    <td>{{ $tour->id }}</td>
                    <td>{{ $tour->title}}</td>
                    <td>{{ $tour->price}}</td>
                    <td>{{ $tour->total}} /@if (($tour->total) == count($tour->customer ))
                            <span style="color: #EAA4A4">Мест нет</span>
                        @else <b>{{ ($tour->total) - count($tour->customer ) }}</b>
                        @endif</td>
                    <td><a href="{{ route('showCustomer', $tour->id) }}"><i class="fas fa-user-plus" title="Добавить клиента"></i></a></td>

                </tr>
            @endforeach

            </tbody>
        </table>


    </div>

@endsection
