<h4 class="form-section"><i class="ft-user"></i> Informações Pessoais</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('first_name') ? 'error' : ''}}">
            <label for="first_name">Nome:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', isset($user) ? $user->first_name : null) }}" required>
            @if($errors->has('first_name'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('first_name') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('last_name') ? 'error' : ''}}">
            <label for="last_name">Sobrenome:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', isset($user) ? $user->last_name : null) }}" required>
            @if($errors->has('last_name'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('last_name') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group {{$errors->has('email') ? 'error' : ''}}">
            <label for="email">E-mail:<span class="alert-required"> *</span></label>
            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', isset($user) ? $user->email : null) }}" required>
            @if($errors->has('email'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('email') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{$errors->has('birth_date') ? 'error' : ''}}">
            <label for="birth_date">Data de nascimento:<span class="alert-required"> *</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="la la-calendar-o"></span>
                    </span>
                </div>
                <input type='text' class="form-control pickadate" name="birth_date" value="{{ old('birth_date', isset($user) ? date('d/m/Y', strtotime($user->birth_date)) : null) }}" required/>
            </div>
            @if($errors->has('birth_date'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('birth_date') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('roles') ? ' error' : '' }}">
            <label for="roles">Nível de acesso:</label><span class="alert-required"> *</span></label>
            <select name="roles" id="roles" class="form-control" required>
                <option value="">Selecione uma opção</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ isset($user) && $user->roles->contains($role) ? "selected" : "" }}>{{ $role->description }}</option>
                @endforeach
            </select>
            @if($errors->has('roles'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('roles') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div>
<h4 class="form-section"><i class="la la-home"></i> Endereço</h4>
<div class="row">
    <div class="col-md-5">
        <div class="form-group {{$errors->has('address') ? 'error' : ''}}">
            <label for="address">Endereço:<span class="alert-required"> *</span></label>
            <input class="form-control" placeholder="Ex.: Rua 2" type="text" name="address" id="address" value="{{ old('address', isset($user) ? $user->address : null) }}" required>
            @if($errors->has('address'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('address') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group {{$errors->has('number') ? 'error' : ''}}">
            <label for="number">Número:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="number" id="number" value="{{ old('number', isset($user) ? $user->number : null) }}" required>
            @if($errors->has('number'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('number') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group {{$errors->has('neighborhood') ? 'error' : ''}}">
            <label for="neighborhood">Bairro:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="neighborhood" id="neighborhood" value="{{ old('neighborhood', isset($user) ? $user->neighborhood : null) }}" required>
            @if($errors->has('neighborhood'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('neighborhood') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group {{$errors->has('zip_code') ? 'error' : ''}}">
            <label for="zip_code">CEP:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" id='cep' name="zip_code" id="zip_code" value="{{ old('zip_code', isset($user) ? $user->zip_code : null) }}" required>
            @if($errors->has('zip_code'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('zip_code') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group {{$errors->has('complement') ? 'error' : ''}}">
            <label for="complement">Complemento:</label>
            <input class="form-control" type="text" name="complement" id="complement" value="{{ old('complement', isset($user) ? $user->complement : null) }}">
            @if($errors->has('complement'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('complement') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('state') ? 'error' : ''}}">
            <label for="state">Estado:<span class="alert-required"> *</span></label>
            <select name="state" id="state" class="form-control select2" required></select>
            @if($errors->has('state'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('state') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('city') ? 'error' : ''}}">
            <label for="city">Cidade:<span class="alert-required"> *</span></label>
            <select name="city" id="city" class="form-control select2" required></select>
            @if($errors->has('city'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('city') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div>
@if($formType == 'create')
<h4 class="form-section"><i class="ft-unlock"></i> Senha</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('password') ? 'error' : ''}}">
            <label for="password">Senha:<span class="alert-required"> *</span></label>
            <input class="form-control" type="password" name="password" id="password">
            @if($errors->has('password'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('password') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('password_confirmation') ? 'error' : ''}}">
            <label for="password_confirmation">Confirme a senha:<span class="alert-required"> *</span></label>
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
            @if($errors->has('password_confirmation'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('password_confirmation') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div>
@endif