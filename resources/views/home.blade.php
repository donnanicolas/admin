@extends('layouts.admin')

@section('content')
<div class="home-content">
    <div class="mdl-grid">
        <div class="mdl-card dns-pic mdl-cell mdl-cell--6-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
                <h3>
                    <h3><a href="entry.html">DNS</a></h3>
                </h3>
            </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
                <div class="minilogo minilogo-email"></div>
                <div>
                    <strong>Todo los servicios para DNS</strong>
                    <span>Al alcance de su mano</span>
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                    href="/postfix/domains">
                    Ver DNS
                </a>
            </div>
        </div>
        <div class="mdl-card email-pic mdl-cell mdl-cell--6-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
                <h3>
                    <h3><a href="entry.html">Mailboxes</a></h3>
                </h3>
            </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
                <div class="minilogo minilogo-dns"></div>
                <div>
                    <strong>Maneje sus casillas de Email</strong>
                    <span>En un solo lugar</span>
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Ver Mailboxes
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
