@extends('layouts.admin')

@section('content')
<div class="login-content">
    <div class="mdl-card mdl-shadow--2dp demo-card-wide">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Editando: {{ $domain->name }}</h2>
        </div>
        {!! Form::model($domain, ['method' => 'PATCH', 'action' => ['PowerdnsDomainController@update', $domain->id]]) !!}
            @include('powerdns.domain._form', ['submitText' => 'Guardar'])
        {!! Form::close() !!}
    </div>
</div>

@endsection
