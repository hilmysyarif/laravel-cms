<div class="input-field col s12">
    {!! Form::label('name', 'Имя') !!}
    {!! Form::text('name', null, ['class' => 'validate'.($errors->has('name') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'validate'.($errors->has('email') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('password', 'Пароль') !!}
    {!! Form::text('password', null, ['class' => 'validate'.($errors->has('password') ? ' invalid' : '')]) !!}
    @if (isset($item))<small>Если оставить пароль пустым, то он не изменится</small>@endif
</div>

<div class="input-field file-field col s12">
    <div class="btn">
        <span>Фото</span>
        {!! Form::file('image') !!}
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate{{ $errors->has('image') ? ' invalid' : '' }}" type="text" placeholder="Выберите файл">
    </div>
</div>

@if (isset($item) && $item->image)
    <div class="col s12">
        <div><img src="/images/medium/{{ $item->img_url.$item->image }}" alt="" /></div>
        <button class="btn btn-small red waves-effect waves-light" type="button" title="Удалить фото" onclick="deleteImage(this)" data-request-url="{{ route('admin.products.image.delete', $item->id) }}"><i class="material-icons">delete</i></button>
        <div class="preloader-wrapper small active preloader" style="display: none;"><div class="spinner-layer spinner-red-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
    </div>
@endif

<div class="input-field col s12 center">
    <button type="submit" class="btn-large waves-effect waves-light"><i class="material-icons left">check_circle</i> {{ $submitButtonText }}</button>
</div>

<div class="input-field col s12 center">
    <a href="{{ route('admin.users.index') }}" class="btn grey waves-effect waves-light">Отмена</a>
</div>