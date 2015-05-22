@extends('app')

@section('content')

    <h1>Upload course students</h1>
    <hr>

    <div class="ui form">
    {!! Form::open(['action' => 'CoursesController@storeUsers', 'method' => 'POST', 'files' => true]) !!}
        {{-- <div class="field"> --}}
        {{-- {!! Form::label('title', 'Title:') !!} --}}
        {!! Form::hidden('courseid', $id, ['class' => '']) !!}
        {{-- </div> --}}

        <div class="field">
        {!! Form::label('file', 'File:') !!}
        {!! Form::file('file', array('accept'=>'.xls, .xlsx, .cvs', 'class'=>'files')) !!}
        </div>

        <!-- <div class="field"> -->
        <!-- {!! Form::label('body', 'Body:') !!} -->
        <!-- {!! Form::textarea('body', null, ['class' => '']) !!} -->
        <!-- </div> -->

        <!-- <div class="field"> -->
        {!! Form::submit('Upload file', ['class' => 'ui submit right floated button']) !!}
        <!-- </div> -->
    {!! Form::close() !!}
    </div>
@stop