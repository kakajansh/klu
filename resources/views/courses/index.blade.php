@extends('app')

@section('submenu')
<div class="ui fluid two item menu">
  <a href="{{ url('courses') }}" class="{{ Request::is( 'courses') ? 'active' : '' }} item">Hepsini Listele</a>
  <a href="{{ url('courses/create') }}" class="{{ Request::is( 'courses/create') ? 'active' : '' }} item">Yenisini Ekle</a>
</div>
@stop

@section('content')

    <div class="ui selection list">
    @foreach($courses as $course)
        <a href="{{ url('courses', $course->id) }}" class="item">
            <div class="content">
                <div class="header">{{ $course->title }}</div>
            </div>
        </a>
    @endforeach
    </div>

@stop