@extends('page.layouts')
@section('title', 'InfoCustomer')
@section('content')
    <h4>Личные данные</h4>
    <div>{{ $customer->last_name }} {{ $customer->name }} {{ $customer->patronymic }}</div>
    <div>Дата рождения
    {{ ($customer->birthday) ? date('d.m.Y', strtotime($customer->birthday)) : '' }}
    </div>
    <div>Пол
        {{ $customer->gender->gender }}
    </div>
    <div>Телефон {{ $customer->phone }}</div>
    <div>Адрес {{ $customer->address }}</div>
    <div>E-mail {{ $customer->mail }}</div>
    <div>Комментарий {{ $customer->comment }}</div>

    <h4>Паспортные данные</h4>
    <div>Паспорт серия {{ $customer->passport->series }}</div>
    <div>Кем выдын{{ $customer->passport->issue }}</div>
    <div>Срок действия{{ $customer->passport->expire }}</div>

    <a href="{{ route('customers.index') }}">Назад</a>

@endsection
