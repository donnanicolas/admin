@extends('layouts.admin')

@section('content')
<div class="postfix-domain-content">
    <div class="mdl-card dns-pic mdl-cell mdl-cell--6-col">
        <div class="mdl-card__media mdl-color-text--grey-50">
            <h3>
                <h3>{{ $mailbox->username }}</h3>
            </h3>
        </div>
        <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
            <div class="minilogo minilogo-email"></div>
            <div>
                <div>
                    Dominio: {{ $mailbox->domain }}
                </div>
                <div>
                    Nombre: {{ $mailbox->name }}
                </div>
                <div>
                    Creada: {{ $mailbox->created }}
                </div>
                <div>
                    Active: {{ $mailbox->active }}
                </div>
            </div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            {!! Form::open(['method' => 'DELETE', 'class' => 'delete-form', 'action' => ['PostfixMailboxController@destroy', $domain->domain, $mailbox->username]]) !!}
                {!! Form::submit('Borrar', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button-warn']) !!}
            {!! Form::close() !!}
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                href="/postfix/domains/{{ $domain->domain }}/mailboxes/{{ $mailbox->username }}/edit">
                Editar
            </a>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
$('.table-row-link tr').click(function () {
    var link = $(this).data('link');
    if ( !link ) {
        return;
    }

    location.href = link;

})
</script>
@endsection
