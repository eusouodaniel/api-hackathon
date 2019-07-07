<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item @yield('dashboard')">
                <a href="{{ route('backend.home.index') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Início</span>
                </a>
            </li>
            
                <li class="navigation-header"><span data-i18n="nav.category.apps">Cadastros</span></li>
                @role('admin')
                    <li class=" nav-item @yield('user')">
                        <a href="{{ route('backend.users.index') }}">
                            <i class="la la-user"></i>
                            <span class="menu-title" data-i18n="">Usuários</span>
                        </a>
                    </li>
                @endrole
                <li class=" nav-item @yield('car')">
                    <a href="{{ route('backend.cars.index') }}">
                        <i class="la la-car"></i>
                        <span class="menu-title" data-i18n="">Carros</span>
                    </a>
                </li>
                <li class=" nav-item @yield('vacancy')">
                    <a href="{{ route('backend.vacancies.index') }}">
                        <i class="la la-filter"></i>
                        <span class="menu-title" data-i18n="">Vagas</span>
                    </a>
                </li>
            @role('admin')
                <li class="navigation-header"><span data-i18n="nav.category.apps">Configurações gerais</span></li>
                <li class=" nav-item @yield('configuration')">
                    <a href="{{ route('backend.configurations.index') }}">
                        <i class="la la-cogs"></i>
                        <span class="menu-title" data-i18n="">Configurações</span>
                    </a>
                </li>
                <li class="navigation-header"><span data-i18n="nav.category.apps">Relatórios</span></li>
                <li class=" nav-item @yield('login')">
                    <a href="{{ route('backend.accesses.index') }}">
                        <i class="la la-user-secret"></i>
                        <span class="menu-title" data-i18n="">Controle de acesso</span>
                    </a>
                </li>
            @endrole
        </ul>
    </div>
</div>
