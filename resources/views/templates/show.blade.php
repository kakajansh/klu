@extends('app')

@section('content')

<h1>{{ $template->title }}</h1>
<div class="ui divider"></div>
<img src="/{{ $template->thumb }}" width="100%">

    <p>Courses using this template</p>
    @foreach ($template->courses as $course)
    <a href="{{ url('courses', $course->slug) }}">{{ $course->title }}</a>
    @endforeach
@stop