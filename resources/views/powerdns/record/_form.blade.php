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
        {!! Form::text('name', null, ['class' => 'mdl-textfield__input', isset($mailbox) ? 'disabled': '']) !!}
        {!! Form::label('name', 'Nombre:', ['class' => 'mdl-textfield__label']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('type', 'Tipo') !!}
        {!! Form::select('type', \App\PowerdnsRecord::$Types, null, ['id' => 'type-select']) !!}
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::text('content', null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('content', 'Contenido:', ['class' => 'mdl-textfield__label']) !!}
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::input('number', 'ttl', null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('ttl', 'TTL:', ['class' => 'mdl-textfield__label']) !!}
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::input('number', 'prio', null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('prio', 'Prioridad:', ['class' => 'mdl-textfield__label']) !!}
    </div>
</div>
<div class="mdl-card__actions mdl-card--border">
    {!! Form::submit($submitText, ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
</div>
