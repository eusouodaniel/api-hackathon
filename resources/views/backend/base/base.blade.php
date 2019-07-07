<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="16x16 24x24 32x32 64x64" type="image/x-icon" href="{{ isset($configuration) ? asset($configuration->icon) : null }}">
    <title>{{ isset($configuration) ? $configuration->title : 'Hackathon' }} - @yield('pageTitle')</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/vendors.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/fonts/simple-line-icons/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/fonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/fonts/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/fonts/feather/style.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset ('backend/css/base.admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('backend/css/core/menu/menu-types/vertical-menu-modern.css') }}">

    @yield('css')
    @routes
    @laravelPWA
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@include('backend.base.header')
@include('backend.base.menu')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row mb-1">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">
                    @yield('titleBreadcrumb')
                </h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @yield('card-header')
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/js/base.admin.js') }}"></script>
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

        if (document.querySelector('.itemDelete')) {
            document.querySelectorAll('.itemDelete').forEach(function(elItemRemove) {
                elItemRemove.addEventListener('click', function() {
                    var formNameDelete = this.getAttribute('data-form-name')
                    var text = element.getAttribute('data-swal-text')
                    swal({
                        title: 'Remover registro',
                        text: text ? text : "Deseja realmente prosseguir com esta ação?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.hasOwnProperty('value') && result.value) {
                            document.querySelector('form[name="' + formNameDelete +'"]').submit();
                        }
                    });
                });
            });
        }
    });
</script>
<script>
    function removeItem(element){
        var formNameDelete = element.getAttribute('data-form-name')
        var title = element.getAttribute('data-swal-title')
        var text = element.getAttribute('data-swal-text')
        Swal.fire({
            title: title ? title : 'Remover registro',
            text: text ? text : "Deseja realmente prosseguir com esta ação?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.hasOwnProperty('value') && result.value) {
                document.querySelector('form[name="' + formNameDelete +'"]').submit();
            }
        });
    }

    function confirmAction(element){
        var formName = element.getAttribute('data-form-name')
        var urlAction = element.getAttribute('data-url-action')
        var title = element.getAttribute('data-swal-title')
        var text = element.getAttribute('data-swal-text')
        var type = element.getAttribute('data-swal-type')
        Swal.fire({
            title: title ? title : 'Confirmar a ação',
            text: text ? text : "Deseja realmente prosseguir com esta ação?",
            type: type ? type : 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.hasOwnProperty('value') && result.value) {
                if(formName){
                    document.querySelector('form[name="' + formName +'"]').submit();
                }else{
                    window.location = urlAction;
                }
            }
        });
    }

    function getToolBarEditor(){
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ 'header': 1 }, { 'header': 2 }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }],
            [{ 'size': ['small', false, 'large', 'huge'] }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'font': [] }],
            [{ 'align': [] }],
            ['clean']
        ];
        return toolbarOptions;
    }
</script>
</body>
</html>
