@extends('page.layouts')
@section('title', 'Costumers')
@section('content')
    <div class="customers">
        <a href="{{ route('customers.create') }}" class="btn btn-success">Новый клиент</a>
        <h2>Клиенты</h2>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Ф.И.О</th>
                <th>Пол</th>
                <th>Дата рождения</th>
                <th>Email</th>
                <th>Номер телефона</th>
                <th></th>
                <th>Комментарий</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
{{--                {{dd($customer->gender)}}--}}
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->last_name}} {{ substr($customer->name, 0, 2) }}. {{ substr($customer->patronymic, 0, 2) }}.</td>
                    <td>{{substr($customer->gender->gender, 0, 2) ?? ''}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>




    </div>
@endsection
