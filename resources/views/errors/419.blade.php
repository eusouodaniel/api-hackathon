<?php ?>
@extends('errors.layouts.app')
@section('pageTitle', 'Página não encontrada')
@section('content')
<div class="row">
    <div class="col-md-12 my-5 text-center">
        <h1 class="display-1">419</h1>
        <div class="display-4 mb-3">Sua sessão expirou</div>
        <div class="lead">Devido a muito tempo de inatividade, sua sessão foi expirada.</div>
        <div class="lead">Volte para a <a href="{{ URL::to('/') }}">página inicial</a>.</div>
    </div>
</div>
@endsection