@extends('auth.base.base')
@section('pageTitle', 'Enviar link de recuperação')
@section('content')
<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                    <div class="card-title text-center">
                        <img src="{{ isset($configuration) ? asset($configuration->logo) : null }}" alt="Hackathon" width="180px" height="180px">
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}" novalidate>
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" id="email" placeholder="Seu e-mail" name="email"
                                    required>
                                <div class="form-control-position">
                                    <i class="la la-envelope"></i>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="la la-unlock"></i> Enviar link de recuperação</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
