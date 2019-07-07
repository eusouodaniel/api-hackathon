<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($configuration) ? $configuration->title : 'Hackathon' }}</title>
        <link rel="icon" sizes="16x16 24x24 32x32 64x64" type="image/x-icon" href="{{ isset($configuration) ? asset($configuration->icon) : null }}">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        @laravelPWA
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                        @role('admin')
                            <a href="{{ route('backend.home.index') }}">Administrativo</a>
                        @else
                            <a href="{{ route('backend.home.index') }}">Painel</a>
                        @endrole
                        <a class="a-logout" href="{{ url('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Sair</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registro</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d60022.980235130846!2d-43.97961467371207!3d-19.906012457087822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m5!1s0xa690aa701c9aff%3A0x7106c08696bbbde1!2s%C3%93rbi+Conecta%2C+Av.+Pres.+Ant%C3%B4nio+Carlos%2C+681+-+Lagoinha%2C+Belo+Horizonte+-+MG%2C+31210-010!3m2!1d-19.9060159!2d-43.9445094!4m0!5e0!3m2!1spt-BR!2sbr!4v1562484451320!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                <p>Tempo: <input type="time" name='time'></p>
                <p>Raio: <input type="range" name='range'></p>
                <p>Valor: <input type="number" name='price'></p>
                <p><button><a href="{{ route('frontend.vacancy.index') }}">Achar vaga</a></button></p>
                @guest
                    <div class="title m-b-md">
                        {{ isset($configuration) ? $configuration->title : 'Hackathon' }}
                    </div>
                @endguest
            </div>
        </div>
    </body>
</html>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
