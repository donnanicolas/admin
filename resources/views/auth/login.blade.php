@extends('layouts.general')

@section('content')
<div class="login-content">
    <div class="mdl-card mdl-shadow--2dp demo-card-wide">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Iniciar Sessión</h2>
        </div>
        {!! Form::open(['url' => '/auth/login']) !!}
            <div class="mdl-card__supporting-text">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Opps!</strong><br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! Form::text('email', null, ['class' => 'mdl-textfield__input']) !!}
                    {!! Form::label('email', 'E-Mail:', ['class' => 'mdl-textfield__label']) !!}
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! Form::password('password', ['class' => 'mdl-textfield__input']) !!}
                    {!! Form::label('password', 'Contraseña:', ['class' => 'mdl-textfield__label']) !!}
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                {!! Form::submit('Iniciar Sesión', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
