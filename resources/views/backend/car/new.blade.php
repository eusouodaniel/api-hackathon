@extends('backend.base.base')
@section('pageTitle','Novo carro')
@section('car', 'active')
@section('titleBreadcrumb', 'Carros')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('backend.cars.index')}}">Carros</a>
    </li>
    <li class="breadcrumb-item">
        Novo
    </li>
@endsection
@section('content')
    <form role="form" method="POST" action="{{ route('backend.cars.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('backend.car.form')
        <div class="form-group">
            <button id="submit-car" type="submit" class="@include('backend.base.buttons.button-register')">
                Cadastrar
            </button>
            <a class="@include('backend.base.buttons.button-cancel')" href="{{ route('backend.cars.index') }}">
                Cancelar
            </a>
        </div>
    </form>
@endsection
