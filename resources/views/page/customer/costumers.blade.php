@extends('page.layouts')
@section('title', 'Costumers')
@section('content')
    <div class="customers">
        <h2>Клиенты</h2>
        <a href="{{ route('customers.create') }}" class="btn btn-success">Новый клиент</a>
        <p>
            <input type="search" name="" id="">
        </p>

        <table class="table">
            <thead class="thead">
            <tr>
                <th>ID</th>
                <th>Ф.И.О</th>
                <th>Пол</th>
                <th>Дата рождения</th>
                <th>Номер телефона</th>
                <th>Статус</th>
                <th>Подробно</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)

                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->last_name }} {{ substr($customer->name, 0, 2) }}. {{ substr($customer->patronymic, 0, 2) }}.</td>
                    <td>{{ substr($customer->gender->gender, 0, 2) ?? ''}}</td>
                    <td>{{ ($customer->birthday) ? date('d.m.Y', strtotime($customer->birthday)) : '' }}</td>
                    <td>{{ $customer->phone ?? '' }}</td>
                    <td>Статус - постоянный клиент</td>
                    <td>
                        <a href="" class="arrow"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>


    </div>
@endsection
