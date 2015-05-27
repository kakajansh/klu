<div class="ui small form">
    <div class="ui header">Sertifika dogrulama</div>
    {!! Form::open(['action' => 'AwardsController@check', 'method' => 'POST']) !!}
    <div class="fields">
        <div class="ten wide field">
            {!! Form::text('checkno', null, [
                    'class' => '',
                    'placeholder'=>'Sertifika no',
                    'required'=>'']) !!}
        </div>
        <div class="six wide field">
            {!! Form::submit('Dogrula', ['class' => 'ui fluid button']) !!}
            {{-- <a href="/check" class="ui fluid button">Check</a> --}}
        </div>
    </div>
    {!! Form::close() !!}
</div>