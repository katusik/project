@extends('page.layouts')
@section('title', 'Tours/admin')
@section('content')

    <div class="tour">
        <h2>Туры</h2>
        <a href="{{ route('admin-tour.create') }}" class="btn btn-success">Добавить тур</a>

        <table class="table">
            <thead class="thead">
            <tr>
                <th>Id</th>
                <th>Название тура</th>
                <th>Описание</th>
                <th></th>
                <th>Страна</th>
                <th>Дни</th>
                <th>Цена($)</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tours as $tour)
                <tr>
                    <td>{{ $tour->id }}</td>
                    <td>{{ $tour->title }}</td>
                    <td>{{ $tour->description }}</td>
                    <td>{!! ($tour->type == 'Автобусный') ? '<i class="fas fa-bus-alt"></i>' : '<i class="fas fa-plane-departure"></i>' !!} </td>
                    <td>{{ $tour->country }}</td>
                    <td>{{ $tour->days }}</td>
                    <td>{{ $tour->price }}</td>

                        <td>
                            <a href="{{ route('admin-tour.edit', $tour->id) }}">
                                <img src="{{ asset('image/edit.png') }}" alt="edit" width="25" title="Редактировать">
                            </a>
                        </td>

                        <td>
                            <form action="{{ route('admin-tour.destroy', $tour->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="image" src="{{ asset('image/erase_delete.png')  }}" width="25" title="Удалить">
                            </form>
                        </td>

                </tr>
            @endforeach
            </tbody>
{{--            {{$tours->links()}}--}}
        </table>

    </div>

@endsection


