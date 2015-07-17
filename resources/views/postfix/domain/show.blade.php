@extends('layouts.admin')

@section('content')
<div class="postfix-domain-content">
    <div class="mdl-grid">
        <div class="mdl-card dns-pic mdl-cell mdl-cell--6-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
                <h3>
                    <h3>{{ $domain->domain }}</h3>
                </h3>
            </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
                <div class="minilogo minilogo-email"></div>
                <div>
                    <div>
                        Description: {{ $domain->description }}
                    </div>
                    <div>
                        Alias: {{ $domain->aliases }}
                    </div>
                    <div>
                        Mailboxes: {{ $domain->mailboxes }}
                    </div>
                    <div>
                        Active: {{ $domain->active }}
                    </div>
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                {!! Form::open(['method' => 'DELETE', 'class' => 'delete-form', 'action' => ['PowerdnsDomainController@destroy', $domain->id]]) !!}
                    {!! Form::submit('Borrar', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button-warn']) !!}
                {!! Form::close() !!}
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                    href="/postfix/domains/{{$domain->domain}}/edit">
                    Editar
                </a>
            </div>
        </div>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp table-row-link mdl-cell mdl-cell--6-col">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">E-Mail</th>
                    <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                    <th class="mdl-data-table__cell--non-numeric">Modificado</th>
                    <th class="mdl-data-table__cell--non-numeric">Activo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($domain->mailboxesRel as $mailbox)
                <tr data-link="/postfix/domains/{{ $domain->domain }}/mailboxes/{{ $mailbox->username }}">
                    <td class="mdl-data-table__cell--non-numeric">{{ $mailbox->username }}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{ $mailbox->name }}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{ $mailbox->modified }}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{ $mailbox->active }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="md-cell md-cell--2-col">
            <a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
                href="/postfix/domains/{{ $domain->domain }}/mailboxes/create">
                <i class="material-icons">add</i>
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
