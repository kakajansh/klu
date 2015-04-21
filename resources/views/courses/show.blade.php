@extends('app')

@section('content')

<h1>{{ $course->title }}</h1>
<img src="/{{ $course->template->thumb }}" width="100%">

<a href="{{ action('CoursesController@attend', $course->id) }}" class="ui button">Bu kursa katilcam</a>

<div class="ui divider"></div>
<p>Bu kursa katilanlar: </p>

<ul>
@foreach($course->users as $user)
    <li>{{ $user->ad }} {{ $user->soyad }}</li>
@endforeach
</ul>

<a href="{{ url('awards/multi', $course->id) }}">Belgeleri bastir</a>

@stop