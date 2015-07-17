<div class="mdl-card__supporting-text">
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
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::text('name', null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('name', 'Nombre:', ['class' => 'mdl-textfield__label']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('type', 'Tipo') !!}
        {!! Form::select('type', \App\PowerdnsDomain::$Types, null, ['id' => 'type-select']) !!}
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!! Form::text('Master', null, ['id' => 'master-input', 'class' => 'mdl-textfield__input', 'disabled']) !!}
        {!! Form::label('Master', 'Ip de la Master Zone:', ['class' => 'mdl-textfield__label']) !!}
        <div class="mdl-tooltip" for="master-input">
            Solo necesario si es de tipo SLAVE
        </div>
    </div>
</div>
<div class="mdl-card__actions mdl-card--border">
    {!! Form::submit($submitText, ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
</div>

@section('footer')
    <script type="text/javascript">
        $('#type-select').change(function () {
            var val = $(this).val();
            var masterInput = $('#master-input');
            if ( 'SLAVE' === val ) {
                masterInput.prop('disabled', false);
                return;
            }
            masterInput.prop('disabled', true);
        });
    </script>
@endsection
