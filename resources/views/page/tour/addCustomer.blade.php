@extends('page.layouts')
@section('title', 'Add')
@section('content')
    <div class="customers">
        Добавить клиентов к туру: <h5>{{$tour->title}}</h5>

        <table class="table">
            <thead class="thead">
            <tr>
                <th></th>
                <th>ID</th>
                <th>Ф.И.О</th>
                <th>Дата рождения</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>
                        <input type="checkbox" name="check[]" value="{{ $customer->id }}" form="checkCustomers">
                    </td>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->last_name }} {{ substr($customer->name, 0, 2) }}. {{ substr($customer->patronymic, 0, 2) }}.</td>
                    <td>{{ ($customer->birthday) ? date('d.m.Y', strtotime($customer->birthday)) : '' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="display: flex; justify-content: space-between">
            <form action="{{ route('addCustomer') }}" method="post" id="checkCustomers">
                @csrf
                <input type="submit" value="Добавить" class="btn btn-success" >
            </form>
            <a href="{{ route('tour') }}">Отмена</a>
        </div>



    </div>
@endsection
