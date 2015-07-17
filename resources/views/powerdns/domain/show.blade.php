@extends('layouts.admin')

@section('content')
<div class="postfix-domain-content">
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
    <div class="mdl-grid">
        <div class="mdl-card dns-pic mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
                <h3>
                    <h3>{{ $domain->name }}</h3>
                </h3>
            </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
                <div class="minilogo minilogo-email"></div>
                <div>
                    <div>
                        Tipo: {{ $domain->type }}
                    </div>
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                {!! Form::open(['method' => 'DELETE', 'class' => 'delete-form', 'action' => ['PowerdnsDomainController@destroy', $domain->id ]]) !!}
                    {!! Form::submit('Borrar', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button-warn']) !!}
                {!! Form::close() !!}
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                    href="{{ action('PowerdnsDomainController@edit', $domain->id) }}">
                    Editar
                </a>
            </div>
        </div>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp table-row-link mdl-cell mdl-cell--12-col">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                    <th class="mdl-data-table__cell--non-numeric">Tipo</th>
                    <th class="mdl-data-table__cell--non-numeric">Contenido</th>
                    <th>TTL</th>
                    <th>Prioridad
                    <th class="mdl-data-table__cell--non-numeric">Modificado</th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($domain->records as $record)
                <tr data-link="">
                    <td class="mdl-data-table__cell--non-numeric">{{ $record->name }}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{ $record->type }}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{ $record->content }}</td>
                    <td>{{ $record->ttl }}</td>
                    <td>{{ $record->prio }}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{ $record->change_date }}</td>
                    <td>
                        <a class="mdl-button mdl-js-button mdl-button--icon" href="{{ action('PowerdnsRecordController@edit', [$domain->id, $record->id] ) }}">
                            <i class="material-icons">create</i>
                        </a>
                        {!! Form::open(['method' => 'DELETE', 'class' => 'delete-form', 'action' => ['PowerdnsRecordController@destroy', $domain->id, $record->id ]]) !!}
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--icon">
                                <i class="material-icons">delete</i>
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
        href="{{ action('PowerdnsRecordController@create', $domain->id) }}">
        <i class="material-icons">add</i>
    </a>
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
