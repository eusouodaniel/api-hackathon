@extends('backend.base.base')
@section('user', 'active')
@section('pageTitle','Editar usuário')
@section('titleBreadcrumb', 'Usuários')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('backend.users.index')}}">Usuários</a>
    </li>
    <li class="breadcrumb-item">
        Editar
    </li>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/custom/css/image-input/image-input.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/forms/selects/select2.min.css') }}">
@endsection
@section('content')
    <form role="form" method="POST" action="{{ route('backend.users.update', array('id' => $user->id)) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @include('backend.user.form', ['formType' => 'update'])
        <div class="form-group">
            <button id="submit-user" type="submit" class="@include('backend.base.buttons.button-register')">
                Atualizar
            </button>
            <a class="@include('backend.base.buttons.button-cancel')" href="{{ route('backend.users.index') }}">
                Cancelar
            </a>
        </div>
    </form>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('backend/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/vendors/js/pickers/pickadate/pickadate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/vendors/custom/js/cidades-estados/cidades-estados-1.4-utf8.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/vendors/custom/js/image-input/image-input.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/custom/js/user/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#cep").mask("99.999-999");
            
            var cityElement = document.getElementById('city');
            var stateElement = document.getElementById('state');

            var currentCity = '{{ $user->city }}';
            var currentState = '{{ $user->state }}';

            new dgCidadesEstados({
                cidade: cityElement,
                estado: stateElement,
                cidadeVal: currentCity,
                estadoVal: currentState
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/js/i18n/pt-BR.js"></script>
@endsection
