<h4 class="form-section"><i class="ft-user"></i> Informações do carro</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('brand') ? 'error' : ''}}">
            <label for="brand">Marca:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="brand" id="brand" value="{{ old('brand', isset($car) ? $car->brand : null) }}" required>
            @if($errors->has('brand'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('brand') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('model') ? 'error' : ''}}">
            <label for="model">Modelo:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="model" id="model" value="{{ old('model', isset($car) ? $car->model : null) }}" required>
            @if($errors->has('model'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('model') as $error)
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
        <div class="form-group {{$errors->has('color') ? 'error' : ''}}">
            <label for="color">Cor:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="color" id="color" value="{{ old('color', isset($car) ? $car->color : null) }}" required>
            @if($errors->has('color'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('color') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{$errors->has('year_of_manufacture') ? 'error' : ''}}">
            <label for="year_of_manufacture">Ano:<span class="alert-required"> *</span></label>
            <input class="form-control" type="number" name="year_of_manufacture" id="year_of_manufacture" value="{{ old('year_of_manufacture', isset($car) ? $car->year_of_manufacture : null) }}" required>
            @if($errors->has('year_of_manufacture'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('year_of_manufacture') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{$errors->has('board') ? 'error' : ''}}">
            <label for="board">Placa:<span class="alert-required"> *</span></label>
            <input class="form-control" type="text" name="board" id="board" value="{{ old('board', isset($car) ? $car->board : null) }}" required>
            @if($errors->has('board'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('board') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div>