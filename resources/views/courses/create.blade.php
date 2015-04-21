@extends('app')

@section('content')

    <h1>Create new course</h1>
    <hr>

    <div class="ui form">
    {!! Form::open(['action' => 'CoursesController@store']) !!}
        <div class="field">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => '']) !!}
        </div>

        <div class="field">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::input('number', 'price') !!}
        </div>

        <div class="field">
        {!! Form::label('template_id', 'Template id:') !!}
        {!! Form::select('template_id', $templates) !!}
        </div>

        <!-- <div class="field"> -->
        <!-- {!! Form::label('body', 'Body:') !!} -->
        <!-- {!! Form::textarea('body', null, ['class' => '']) !!} -->
        <!-- </div> -->

        <!-- <div class="field"> -->
        {!! Form::submit('Add new Course', ['class' => 'ui submit right floated button']) !!}
        <!-- </div> -->
    {!! Form::close() !!}
    </div>
@stop