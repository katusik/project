@extends('page.layouts')
@section('title', 'Costumers')
@section('content')
    <div class="customers">

        <h2>Клиенты</h2>
        <a href="{{ route('customers.create') }}" class="btn btn-success">Добавить клиента</a>
        <p>
            <input type="search" name="" id="">
        </p>

        <table class="table">
            <thead class="thead">
            <tr>
                <th>ID</th>
                <th>Ф.И.О</th>
                <th>Дата рождения</th>
                <th>Номер телефона</th>
                <th>Комментарий</th>
                <th>Подробно</th>
                <th>Название тура</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)

                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->last_name }} {{ substr($customer->name, 0, 2) }}. {{ substr($customer->patronymic, 0, 2) }}.</td>
{{--                    <td>{{ isset($customer->gender->gender) ? substr($customer->gender->gender, 0, 2) : ''}}</td>--}}

                    <td>{{ ($customer->birthday) ? date('d.m.Y', strtotime($customer->birthday)) : '' }}</td>
                    <td>{{ $customer->phone ?? '' }}</td>
                    <td>{{ $customer->comment ?? '' }}</td>

                    <td>
                        <a href="{{ route('customers.show', $customer->id) }}" class="arrow"></a>
                    </td>
                    <td>заголовок тура</td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
@endsection
