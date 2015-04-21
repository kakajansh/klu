@extends('app')

@section('content')
    <h1>{{ $user->ad }} {{ $user->soyad }}</h1> &sdot; {{ $user->ogrno }}

    <div class="ui divider"></div>
    <p>Katildigi kurslar: </p>

    <ul>
    @foreach($user->courses as $course)
        <li>{{ $course->title }}
            &nbsp;&nbsp;&sdot;&nbsp;&nbsp;
            <a href="{{ url('awards/show', array($course->id, $user->id)) }}">Belgeni al</a>
        </li>
    @endforeach
    </ul>
@stop