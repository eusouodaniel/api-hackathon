<h4 class="form-section"><i class="ft-user"></i> Informações da vaga</h4>
<div class="row">
    <div class="col-md-12">
        <div class="form-group {{$errors->has('photo') ? 'error' : ''}}">
            <label>Foto:</label>
            <input type="file" class="form-control" name="photo" id="photo" data-current="{{ isset($vacancy) ? asset('storage/vacancies/'.$vacancy->photo) : null }}">
            @if($errors->has('photo'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('photo') as $error)
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
        <div class="form-group {{$errors->has('phone') ? 'error' : ''}}">
            <label for="phone">Telefone:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', isset($vacancy) ? $vacancy->phone : null) }}" required>
            @if($errors->has('phone'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('phone') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('cpf') ? 'error' : ''}}">
            <label for="cpf">CPF:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="cpf" id="cpf" value="{{ old('cpf', isset($vacancy) ? $vacancy->cpf : null) }}" required>
            @if($errors->has('cpf'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('cpf') as $error)
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
        <div class="form-group {{$errors->has('address_of_residence') ? 'error' : ''}}">
            <label for="address_of_residence">Endereço da residência:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="address_of_residence" id="address_of_residence" value="{{ old('address_of_residence', isset($vacancy) ? $vacancy->address_of_residence : null) }}" required>
            @if($errors->has('address_of_residence'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('address_of_residence') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{$errors->has('garage_address') ? 'error' : ''}}">
            <label for="garage_address">Endereço da garagem:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="garage_address" id="garage_address" value="{{ old('garage_address', isset($vacancy) ? $vacancy->garage_address : null) }}" required>
            @if($errors->has('garage_address'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('garage_address') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{$errors->has('job_identification') ? 'error' : ''}}">
            <label for="job_identification">Identificação da vaga:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="job_identification" id="job_identification" value="{{ old('job_identification', isset($vacancy) ? $vacancy->job_identification : null) }}" required>
            @if($errors->has('job_identification'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('job_identification') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div>
<div class='row'>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('rent_value') ? 'error' : ''}}">
            <label for="rent_value">Preço:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="rent_value" id="rent_value" value="{{ old('rent_value', isset($vacancy) ? $vacancy->rent_value : null) }}" required>
            @if($errors->has('rent_value'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('rent_value') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('description') ? 'error' : ''}}">
            <label for="description">Descrição:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', isset($vacancy) ? $vacancy->description : null) }}" required>
            @if($errors->has('description'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('description') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div>