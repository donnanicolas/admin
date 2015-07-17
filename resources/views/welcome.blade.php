@extends('layouts.general')

@section('content')
<div class="mdl-card email-pic mdl-cell mdl-cell--6-col">
    <div class="mdl-card__media mdl-color-text--grey-50">
        <h3><a href="/postfix/domains">Mailboxes</a></h3>
    </div>
    <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
        <div class="minilogo minilogo-email"></div>
        <div>
            <strong>Maneje sus casillas de Email</strong>
            <span>En un solo lugar</span>
        </div>
    </div>
</div>
<div class="mdl-card dns-pic mdl-cell mdl-cell--6-col">
    <div class="mdl-card__media mdl-color-text--grey-50">
        <h3>
            <h3><a href="/powerdns/domains">DNS</a></h3>
        </h3>
    </div>
    <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
        <div class="minilogo minilogo-email"></div>
        <div>
            <strong>Todo los servicios para DNS</strong>
            <span>Al alcance de su mano</span>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
Array.prototype.forEach.call(document.querySelectorAll('.mdl-card__media'), function(el) {
    var link = el.querySelector('a');
    if(!link) {
        return;
    }
    var target = link.getAttribute('href');
    if(!target) {
        return;
    }
    el.addEventListener('click', function() {
        location.href = target;
    });
});
</script>
@endsection
