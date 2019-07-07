@extends('auth.base.base')
@section('pageTitle', 'Redefinir senha')
@section('content')
<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="p-1" style='background-color: black;'>
                            <img src="{{ isset($configuration) ? asset($configuration->logo) : null }}" alt="Hackathon" width="180px" height="180px">
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal form-simple" action="{{ route('password.update') }}" novalidate method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" id="email" placeholder="Seu e-mail" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                <div class="form-control-position">
                                    <i class="la la-envelope"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="password" class="form-control" name="password" placeholder="Nova senha" required autocomplete="new-password">
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirme a nova senha" name="password_confirmation" required autocomplete="new-password">
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="la la-unlock-alt"></i> Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Resetar senha') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Resetar senha') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
