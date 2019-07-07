@extends('auth.base.base')
@section('pageTitle', 'Registrar')    
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
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Cadastre-se agora no Hackathon</span></h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class='row'>
                            <fieldset class="col form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="user-name" placeholder="Nome"
                                    required value="{{ old('first_name') }}" autofocus name="first_name">
                                <div class="form-control-position">
                                    <i class="la la-user"></i>
                                </div>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                            <fieldset class="col form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="user-name" placeholder="Sobrenome"
                                    required value="{{ old('last_name') }}" autofocus name="last_name">
                                <div class="form-control-position">
                                    <i class="la la-user"></i>
                                </div>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                        </div>
                        <fieldset class="form-group position-relative has-icon-left mb-1">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="user-email" placeholder="Email"
                                required value="{{ old('email') }}" autofocus name="email">
                            <div class="form-control-position">
                                <i class="la la-at"></i>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </fieldset>
                        <div class='row'>
                            <fieldset class="col form-group position-relative has-icon-left mb-1">
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="user-password" placeholder="Senha"
                                    required value="{{ old('password') }}" autofocus name="password">
                                <div class="form-control-position">
                                    <i class="la la-eye"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </fieldset>

                            <fieldset class="col form-group position-relative has-icon-left mb-1">
                                <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="user-password_confirmation" placeholder="Confirmar senha"
                                    required value="{{ old('password_confirmation') }}" autofocus name="password_confirmation">
                                <div class="form-control-position">
                                    <i class="la la-eye"></i>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <p class="card-subtitle line-on-side text-muted text-center font-small-3"><span>Já possui cadastro?</span></p>
                <div class="card-body">
                    <a href="{{ route('login') }}" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
