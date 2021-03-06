@extends('layouts.admin')

@section('content')
<div class="login-content">
    <div class="mdl-card mdl-shadow--2dp demo-card-wide">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Nuevo Record para {{$domain->name}}</h2>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => ['PowerdnsRecordController@store', $domain->id]]) !!}
            @include('powerdns.record._form', ['submitText' => 'Guardar'])
        {!! Form::close() !!}
    </div>
</div>

@endsection
