@extends('app')

@section('content')

<h1>{{ $course->title }}</h1>
<img src="/{{ $course->template->thumb }}" width="100%">


{{-- <a href="{{ action('CoursesController@attend', $course->id) }}" class="ui button">Bu kursa katil</a> --}}

<div class="ui four fluid tiny buttons">
<a href="{{ action('CoursesController@upload', $course->id) }}" class="ui button">
    <i class="file excel outline icon "></i>Excel yukle
</a>
<a href="{{ action('AwardsController@multi', $course->id) }}" class="ui button">
    <i class="file pdf outline icon"></i>Belge bastir
</a>
<a href="{{ action('CoursesController@edit', $course->id) }}" class="ui button">
    <i class="save icon"></i>Update
</a>
{!! Form::open(['method'=>'DELETE', 'action'=>['CoursesController@destroy', $course->id]]) !!}
<button type="submit" class="ui red button" onclick="if(!confirm('Son kararin?')){return false;};">
    <i class="trash outline icon"></i>Remove
</button>
{!! Form::close() !!}
{{-- <a href="{{ action('AwardsController@multi', $course->id) }}" class="ui red button">
    <i class="trash outline icon"></i>Remove
</a> --}}
</div>

<div class="ui divider"></div>
<p>Bu kursa katilanlar: </p>

<ul>
@if (count($course->users) > 0)
    @foreach($course->users as $user)
        <li>{{ $user->ad }} {{ $user->soyad }}</li>
    @endforeach
@else
    Bu kursa daha kimse katilmadi
@endif
</ul>


@stop