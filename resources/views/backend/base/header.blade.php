<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('backend.home.index')}}" >
                        <img class="brand-logo" alt="Hackathon" src="{{ asset('backend/images/logo/logo.png') }}" style='background-color: black;'>
                        <h3 class="brand-text">Painel</h3>
                    </a>
                </li>
                <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav w-100 d-flex justify-content-end">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">{{ Auth::user()->first_name }}</span><span class="avatar"><img src="{{ isset(Auth::user()->photo) ? asset('storage/users/'.Auth::user()->photo) : asset('backend/images/avatar.jpg') }}" alt="avatar"><i></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ URL::to('/') }}" target='_blank'><i class="ft-arrow-left"></i> Voltar para o site</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="ft-power"></i> Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>