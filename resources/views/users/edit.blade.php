@extends('app')

@section('content')
    <h2 class="ui block header">
        Edit your profile
    </h2>
    @if (count($errors) > 0)
        <div class="ui error message">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="ui form">
    {!! Form::model($user, ['action' => 'UsersController@update', 'method' => 'POST']) !!}
        <div class="two fields">
        <div class="field">
        {!! Form::label('ad', 'Ad:') !!}
        {!! Form::text('ad', null, ['class' => '']) !!}
        </div>

        <div class="field">
        {!! Form::label('soyad', 'Soyad:') !!}
        {!! Form::text('soyad', null, ['class' => '']) !!}
        </div>
        </div>

        {{-- <div class="field"> --}}
        {{-- {!! Form::label('ogrno', 'Öğrenci No:') !!} --}}
        {{-- {!! Form::text('ogrno', null, ['class' => '']) !!} --}}
        {{-- </div> --}}

        {{-- <div class="field"> --}}
        {{-- {!! Form::label('email', 'Mail adres:') !!} --}}
        {{-- {!! Form::text('email', null, ['class' => '']) !!} --}}
        {{-- </div> --}}

        <div class="field">
        {!! Form::label('password', 'Şifre:') !!}
        {!! Form::password('password', null, ['class' => '']) !!}
        </div>

        <div class="field">
        {!! Form::label('password_confirmation', 'Şifre tekrar:') !!}
        {!! Form::password('password_confirmation', null, ['class' => '']) !!}
        </div>


        <!-- <div class="field"> -->
        {!! Form::submit('Update Profile', ['class' => 'ui submit right floated button']) !!}
        <!-- </div> -->
    {!! Form::close() !!}
    </div>
@endsection