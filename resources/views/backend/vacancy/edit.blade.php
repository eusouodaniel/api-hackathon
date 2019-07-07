@extends('backend.base.base')
@section('vacancy', 'active')
@section('pageTitle','Editar vaga')
@section('titleBreadcrumb', 'Vagas')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('backend.vacancies.index')}}">Vagas</a>
    </li>
    <li class="breadcrumb-item">
        Editar
    </li>
@endsection
@section('content')
    <form role="form" method="POST" action="{{ route('backend.vacancies.update', array('id' => $vacancy->id)) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @include('backend.vacancy.form')
        <div class="form-group">
            <button id="submit-vacancy" type="submit" class="@include('backend.base.buttons.button-register')">
                Atualizar
            </button>
            <a class="@include('backend.base.buttons.button-cancel')" href="{{ route('backend.vacancies.index') }}">
                Cancelar
            </a>
        </div>
    </form>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('backend/vendors/custom/js/image-input/image-input.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('backend/custom/js/vacancy/main.js') }}"></script> -->
@stop