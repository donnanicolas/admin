@extends('layouts.admin')

@section('content')
<div class="login-content">
    <div class="mdl-card mdl-shadow--2dp demo-card-wide">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Editando: {{ $domain->domain }}</h2>
        </div>
        {!! Form::model($mailbox, ['method' => 'PATCH', 'action' => ['PostfixMailboxController@update', $domain->domain, $mailbox->username]]) !!}
            @include('postfix.mailbox._form', ['submitText' => 'Editar'])
        {!! Form::close() !!}
    </div>
</div>

@endsection
