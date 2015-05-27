@extends('app')

@section('content')

    <h1>Edit course</h1>
    <hr>
    @include('errors.list')

    <div class="ui form">
    {!! Form::model($course, ['method' => 'PATCH', 'action' => ['CoursesController@update', $course->id]]) !!}
        @include('courses.form', ['submitButton'=>'Update course'])
    {!! Form::close() !!}
    </div>

@stop