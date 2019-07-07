@extends('auth.base.base')
@section('pageTitle', 'Login')
@section('content')
<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="p-1">
                            <img src="{{ isset($configuration) ? asset($configuration->logo) : null }}" alt="Hackathon" width="180px" height="180px">
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Logue agora mesmo</span></p>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('login') }}" novalidate method="POST">
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" id="email" placeholder="Seu e-mail" name="email"
                                    required>
                                <div class="form-control-position">
                                    <i class="la la-envelope"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control" id="user-password"
                                    placeholder="Informe sua senha" required name='password'>
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left mb-3">
                                <div class="text-center"><a href="{{ route('password.request') }}" class="card-link">Esqueceu a senha?</a></div>
                            </fieldset>
                            {{-- <div class="form-group row">
                                <div class="col-sm-6 col-12 text-center text-sm-left">
                                    <fieldset>
                                        <input type="checkbox" id="remember-me" class="chk-remember form-group" name='remember'>
                                        <label for="remember-me"> Mantenha-me conectado</label>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12 text-center text-sm-right">
                                    <a href="{{ route('password.request') }}" class="card-link">Esqueceu sua senha?</a>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="la la-unlock-alt"></i> Entrar</button>
                        </form>
                    </div>
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3"><span>Ainda não possui cadastro?</span></p>
                    <div class="card-body">
                        <a href="{{ route('register') }}" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
