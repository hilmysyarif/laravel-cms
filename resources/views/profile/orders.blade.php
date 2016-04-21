@extends('layouts.app')

@section('title', 'Личный кабинет - Заказы')

@section('content')
    @include('partials._personal_menu', ['ordersActive' => true])

    <div class="page-header">
        <h4 class="text-center">Заказы</h4>
    </div>

    @include('partials._status')
    @include('partials._errors')

    <div class="no-items">- нет заказов -</div>
@endsection