@extends('app')

@section('content')

<h1>{{ $course->title }}</h1>
<img src="/{{ $course->template->thumb }}" width="100%">

{{-- <a href="{{ action('CoursesController@attend', $course->id) }}" class="ui button">Bu kursa katilcam</a> --}}
<a href="{{ action('CoursesController@attend', $course->id) }}" class="ui button">Bu kursa katil</a>
<a href="{{ action('CoursesController@upload', $course->id) }}" class="ui button">Excel file</a>
<a href="{{ action('AwardsController@multi', $course->id) }}" class="ui button">Belgeleri bastir</a>

<div class="ui divider"></div>
<p>Bu kursa katilanlar: </p>

<ul>
@if (count($course->users) > 0)
    @foreach($course->users as $user)
        <li>{{ $user->ad }} {{ $user->soyad }}</li>
    @endforeach
@else
    bilgi yok
@endif
</ul>


@stop