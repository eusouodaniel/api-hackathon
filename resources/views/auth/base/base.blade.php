<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="{{ isset($seo) ? $seo->index_and_follow : 'noindex, nofollow' }}">
    <meta property="og:title" content="{{ isset($seo) ? $seo->title : 'Hackathon' }}" />
    <meta property="og:description" content="{{ isset($seo) ? $seo->description : 'Controle de candidatos' }}" />
    <meta property="og:type" content="site" />
    <meta property="og:locale" content="pt-BR" />
    <meta property="og:url" content="{{ env('APP_URL_BASE') }}" />
    <link rel="icon" sizes="16x16 24x24 32x32 64x64" type="image/x-icon" href="{{ isset($configuration) ? asset($configuration->icon) : null }}">
    <title>{{ isset($configuration) ? $configuration->title : 'Hackathon' }} - @yield('pageTitle')</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/fonts/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/base.admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/base.auth.css') }}">
    @yield('css')
</head>
<body class="vertical-layout vertical-menu-modern 1-column   blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
    @yield('js')
    <script>
        $(document).ready(function(){
            function showNotification(type, msg) {
                new Noty({
                    theme    : 'nest',
                    closeWith: ['click', 'button'],
                    type: type,
                    layout: 'topRight',
                    text: msg,
                    timeout: 8000,
                }).show();
            }

            @if (session()->has('success'))
                var flashMessage = "{{ session('success') }}"
                showNotification('success', flashMessage)
            @endif

            @if (session()->has('error'))
                var flashMessage = "{{ session('error') }}"
                showNotification('error', flashMessage)
            @endif

            @if(session('status'))
                var flashMessage = "{{ session('status') }}"
                showNotification('info', flashMessage)
            @endif

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    var flashMessage = "{{ $error }}"
                    showNotification('error', flashMessage)
                @endforeach
            @endif
        });
    </script>
</body>
</html>
