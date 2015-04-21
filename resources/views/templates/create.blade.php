@extends('app')

@section('content')

    <h1>Create new template</h1>
    <hr>

        <!--
        @if(Session::has('success'))
            <div class="alert-box success">
            <h2>{!! Session::get('success') !!}</h2>
            </div>
        @endif
        -->

    <div class="ui form">
    {!! Form::open(['action' => 'TemplatesController@store', 'method' => 'POST', 'files' => true]) !!}
        <div class="field">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => '']) !!}
        </div>

        <div class="field">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => '']) !!}
        </div>

        <div class="field">
        {!! Form::label('files', 'Files:') !!}
        {!! Form::file('files[]', array('multiple' => true, 'accept'=>'.pdf,image/*', 'class'=>'files')) !!}
        </div>

        {!! Form::submit('Add new Course', ['class' => 'ui submit right floated disabled button']) !!}
    {!! Form::close() !!}
    </div>
@stop

@section('scripts')
    <script>
        $('.files').change(function()
        {
            if (this.files.length !== 2) {
                $('input[type=submit]').addClass('disabled');
                alert('1 PDF 1de RESIM olmak uzere 2 dosya yuklemelisiniz');
            }
            else {
                $('input[type=submit]').removeClass('disabled');
            }
        });

        $('form').submit(function() {
            if ( $('.files')[0].files.length !== 2 ) return false;
        });
    </script>
@stop