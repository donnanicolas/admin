@extends('layouts.admin')

@section('content')
<div class="postfix-domain-content">
    <div class="mdl-grid">
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp table-row-link mdl-cell mdl-cell--8-col">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Dominio</th>
                    <th class="mdl-data-table__cell--non-numeric">Alias</th>
                    <th>Casillas</th>
                    <th class="mdl-data-table__cell--non-numeric">Activo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($domains as $domain)
                <tr data-link="/postfix/domains/{{ $domain->domain }}">
                    <td class="mdl-data-table__cell--non-numeric">{{ $domain->domain }}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{ $domain->aliases }}</td>
                    <td>{{ $domain->mailboxes }}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{ $domain->active }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mdl-cell mdl-cell--4-col">
            <a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
                href="/postfix/domains/create">
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
