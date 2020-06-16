@extends('page.layouts')
@section('title', 'Costumers')
@section('content')
    <div class="customers">

        <h2>Клиенты</h2>
        <a href="{{ route('customers.create') }}" class="btn btn-success">Добавить клиента</a>

        <table class="table">
            <thead class="thead">
            <tr>
                <th>ID</th>
                <th>Ф.И.О</th>
                <th>Дата рождения</th>
                <th>Номер телефона</th>
                <th>Комментарий</th>
                <th>Выбрать тур</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)

                <tr>
                    <td>{{ $customer->id }}</td>
                    <td><a href="{{ route("customers.show", $customer->id) }}" title="Информация о клиенте">{{ $customer->last_name }} {{ substr($customer->name, 0, 2) }}
                            . {{ substr($customer->patronymic, 0, 2) }}.</a></td>
                    <td>{{ ($customer->birthday) ? date('d.m.Y', strtotime($customer->birthday)) : '' }}</td>
                    <td>{{ $customer->phone ?? '' }}</td>
                    <td>{{ $customer->comment ?? '' }}</td>
                    <td><a href="{{ route('showTour', $customer->id) }}"><i class="fas fa-bus-alt"></i> <i class="fas fa-plane-departure"></i></a></td>

                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}">
                            <img src="{{ asset('image/edit.png') }}" alt="edit" width="25" title="Редактировать">
                        </a>
                    </td>

                    @can('isAdmin')
                        <td>
                            <form action="{{ route("customers.destroy", $customer->id)  }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="image" src="{{ asset('image/erase_delete.png')  }}" width="25" title="Удалить">
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
@endsection
