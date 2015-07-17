@extends('layouts.admin')

@section('content')
<div class="postfix-domain-content">
    <div class="mdl-grid">
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp table-row-link mdl-cell mdl-cell--8-col">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                    <th class="mdl-data-table__cell--non-numeric">Tipo</th>
                    <th class="mdl-data-table__cell--non-numeric">Master</th>
                </tr>
            </thead>
            <tbody>
                @foreach($domains as $domain)
                <tr data-link="{{ action('PowerdnsDomainController@show', $domain->id) }}">
                    <td class="mdl-data-table__cell--non-numeric">{{ $domain->name }}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{ $domain->type }}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{ $domain->master }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mdl-cell mdl-cell--4-col">
            <a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
                href="{{ action('PowerdnsDomainController@create') }}">
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
