@extends('backend.base.base')
@section('car', 'active')
@section('pageTitle','Editar carro')
@section('titleBreadcrumb', 'Carros')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('backend.cars.index')}}">Carros</a>
    </li>
    <li class="breadcrumb-item">
        Editar
    </li>
@endsection
@section('content')
    <form role="form" method="POST" action="{{ route('backend.cars.update', array('id' => $car->id)) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @include('backend.car.form')
        <div class="form-group">
            <button id="submit-car" type="submit" class="@include('backend.base.buttons.button-register')">
                Atualizar
            </button>
            <a class="@include('backend.base.buttons.button-cancel')" href="{{ route('backend.cars.index') }}">
                Cancelar
            </a>
        </div>
    </form>
@endsection
