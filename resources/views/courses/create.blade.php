@extends('app')

@section('content')

    <h1>Create new course</h1>
    <hr>
    @include('errors.list')

    <div class="ui form">
    {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) !!}
        @include('courses.form', ['submitButton'=>'Add new course'])
    {!! Form::close() !!}
    </div>

@stop