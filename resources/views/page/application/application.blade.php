@extends('page.layouts')
@section('title', 'Application')
@section('content')
    <div class="application">

        <table class="table">
            <thead class="thead">
            <tr>
                <th>Название тура</th>
                <th>Кол-во свободных мест</th>
                <th>Список клиентов</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tours as $tour)
                <tr>
                    <td>
                        {{ $tour->title }}
                    </td>
                    <td>
                        {{ ($tour->total) - (count($tour->customer ))}}
                    </td>
                    <td>
                        @foreach($tour->customer as $customer)
                            <a href="{{ route('customers.show', $customer->id) }}">{{ $customer->last_name}} </a>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
