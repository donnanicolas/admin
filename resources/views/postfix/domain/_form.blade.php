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
        {!! Form::text('domain', null, ['class' => 'mdl-textfield__input', isset($domain) ? 'disabled' : '']) !!}
        {!! Form::label('domain', 'Dominio:', ['class' => 'mdl-textfield__label']) !!}
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::text('description', null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('description', 'Descripción:', ['class' => 'mdl-textfield__label']) !!}
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::input('number', 'mailboxes', null, ['class' => 'mdl-textfield__input', 'pattern' => '-?[0-9]*(\.[0-9]+)?']) !!}
        {!! Form::label('mailboxes', 'Casillas:', ['class' => 'mdl-textfield__label']) !!}
        <span class="mdl-textfield__error">No es un número!</span>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::input('number', 'aliases', '10', ['class' => 'mdl-textfield__input', 'pattern' => '-?[0-9]*(\.[0-9]+)?']) !!}
        {!! Form::label('aliases', 'Alias:', ['class' => 'mdl-textfield__label']) !!}
        <span class="mdl-textfield__error">No es un número!</span>
    </div>
    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
        {!! Form::checkbox('active', 1, 1, ['class' => 'mdl-switch__input']) !!}
        <span class="mdl-switch__label">Activa</span>
    </label>
</div>
<div class="mdl-card__actions mdl-card--border">
    {!! Form::submit($submitText, ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
</div>
