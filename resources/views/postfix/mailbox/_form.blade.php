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
    {!! Form::hidden('domain', $domain->domain) !!}
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::text('username', null, ['class' => 'mdl-textfield__input', isset($mailbox) ? 'disabled': '']) !!}
        {!! Form::label('username', 'E-Mail:', ['class' => 'mdl-textfield__label']) !!}
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::text('name', null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('name', 'Nombre:', ['class' => 'mdl-textfield__label']) !!}
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::password('password', ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('password', 'Contraseña:', ['class' => 'mdl-textfield__label']) !!}
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::password('repassword', ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('repassword', 'Repetir Contraseña:', ['class' => 'mdl-textfield__label']) !!}
    </div>
</div>
<div class="mdl-card__actions mdl-card--border">
    {!! Form::submit($submitText, ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
</div>
