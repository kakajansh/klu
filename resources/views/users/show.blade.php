@extends('app')

@section('content')
    <h1>{{ $user->ad }} {{ $user->soyad }}</h1> &sdot; {{ $user->ogrno }}

    <div class="ui divider"></div>
    <p>Katildigi kurslar: </p>

    <ul>
    {{-- {{ $user->courses }} --}}
    @if (count($user->courses) > 0)
        @foreach($user->courses as $course)
            <li>{{ $course->title }}
                &nbsp;&nbsp;&sdot;&nbsp;&nbsp;
                <a href="{{ url('awards/show', array($course->slug, $user->ogrno)) }}">Belgeni al</a>
            </li>
        @endforeach
    @else
        No course
    @endif
    </ul>

    @if ($user->id == Auth::user()->id)
        <a href="/auth/logout">Logout</a>
    @endif
@stop