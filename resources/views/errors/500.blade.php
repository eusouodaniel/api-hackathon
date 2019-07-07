<?php ?>
@extends('errors.layouts.app')
@section('pageTitle', 'Erro de servidor')
@section('content')
<div class="row">
    <div class="col-md-12 my-5 text-center">
        <h1 class="display-1">500</h1>
        <div class="display-4 mb-3">Erro interno</div>
        <div class="lead">Aconteceu um erro e já estamos trabalhando para corrigir.</div>
        <div class="lead">Volte para a <a href="{{ URL::to('/') }}">página inicial</a>.</div>
        @if(!empty(Sentry::getLastEventID()))
            <div class="subtitle">Código do erro: {{ Sentry::getLastEventID() }}</div>
        @endif
        @unless(empty($sentryID))
            <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>
            <script>
            @auth
                Raven.showReportDialog({
                    eventId: '{{ Sentry::getLastEventID() }}',
                    dsn: 'https://e9ebbd88548a441288393c457ec90441@sentry.io/3235',
                    user: {
                        'name': '{{ Auth::user()->name }}',
                        'email': '{{ Auth::user()->email }}',
                    }
                });
            @endauth
            @guest
                Raven.showReportDialog({
                    eventId: '{{ Sentry::getLastEventID() }}',
                    dsn: 'https://e9ebbd88548a441288393c457ec90441@sentry.io/3235',
                    user: {
                        'name': 'not logged in',
                        'email': 'contato@estudos.me',
                    }
                });
            @endguest
            </script>
        @endunless
    </div>
</div>
@endsection