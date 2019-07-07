@extends('backend.base.base')
@section('pageTitle','Editar configurações')
@section('titleBreadcrumb', 'Configurações')
@section('configuration', 'active')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('backend.configurations.index')}}">Configurações</a>
    </li>
    <li class="breadcrumb-item">
            Editar
    </li>
@endsection
@section('content')
	<form method="POST" id="configuration-form" class='form-configuration' action="{{ route('backend.configurations.update', array('id' => $configuration->id)) }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}

		@include('backend.configuration.form')

		<div class="form-group">
			<button id="submit-configuration" type="submit" class="@include('backend.base.buttons.button-register')">
				Atualizar
			</button>
			<a class="@include('backend.base.buttons.button-cancel')" href="{{ route('backend.home.index') }}">
				Voltar pra home
			</a>
		</div>
	</form>
@endsection
@section('js')
	<script type="text/javascript" src="{{ asset('backend/vendors/custom/js/image-input/image-input.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/custom/js/configuration/main.js') }}"></script>
@endsection