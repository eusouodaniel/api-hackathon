<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title">Título da página</label>
            <input type="text" 
                class="form-control" 
                placeholder="Título" 
                name="title" 
                value="{{ old('title', isset($configuration) ? $configuration->title : null) }}" 
                required 
                autofocus> 
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<!--
<div class="row">
    <div class="col-md-12">
        <div class="form-group {{$errors->has('logo') ? 'error' : ''}}">
            <label for="logo">Logo<span class="alert-required"> *</span></label>
            <input class="form-control" type="file" name="logo" id="logo" data-current="{{ isset($configuration) ? asset('storage/banners/'.$configuration->logo) : null }}">
            @if($errors->has('logo'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('logo') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group {{$errors->has('icon') ? 'error' : ''}}">
            <label for="icon">Ícone<span class="alert-required"> *</span></label>
            <input class="form-control" type="file" name="icon" id="icon" data-current="{{ isset($configuration) ? asset('storage/banners/'.$configuration->icon) : null }}">
            @if($errors->has('icon'))
                <small class="help-block">
                    <ul>
                        @foreach ($errors->get('icon') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
        </div>
    </div>
</div> -->