<?php ?>
@extends('errors.layouts.app')
@section('pageTitle', 'Página não encontrada')
@section('content')
<div class="row">
    <div class="col-md-12 my-5 text-center">
        <h1 class="display-1">404</h1>
        <div class="display-4 mb-3">Página não encontrada</div>
        <div class="lead">Nós não localizamos o conteúdo pelo qual busca.</div>
        <div class="lead">Volte para a <a href="{{ URL::to('/') }}">página inicial</a>.</div>
    </div>
</div>
@endsection