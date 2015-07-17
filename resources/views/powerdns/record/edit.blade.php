@extends('layouts.admin')

@section('content')
<div class="login-content">
    <div class="mdl-card mdl-shadow--2dp demo-card-wide">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Editando: {{ $record->name }} - {{ $record->type }}</h2>
        </div>
        {!! Form::model($record, ['method' => 'PATCH', 'action' => ['PowerdnsRecordController@update', $domain->id, $record->id]]) !!}
            @include('powerdns.record._form', ['submitText' => 'Editar'])
        {!! Form::close() !!}
    </div>
</div>

@endsection
