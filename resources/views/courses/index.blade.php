@extends('app')

@section('submenu')
<div class="ui fluid two item menu">
  <a href="{{ url('courses') }}" class="{{ Request::is( 'courses') ? 'active' : '' }} item">Hepsini Listele</a>
  <a href="{{ url('courses/create') }}" class="{{ Request::is( 'courses/create') ? 'active' : '' }} item">Yenisini Ekle</a>
</div>
@stop

@section('content')

@if (count($courses) > 0)
    <div class="ui selection list">
    @foreach($courses as $course)
        <? $sayi =  $course->users->count(); ?>
        <a href="{{ url('courses', $course->slug) }}" class="item">
            <div class="content">
                <div class="header">{{ $course->title }}
                    <div class="right floated header">
                        <div class="ui label">
                            @if ($sayi == 1 || $sayi == 0)
                            <i class="user icon"></i>
                            @elseif ($sayi > 1)
                            <i class="group icon"></i>
                            @endif
                            {{ $sayi }}
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    </div>
@else
    <div class="ui red center aligned header" style="margin: 30px">No Course Found</div>
@endif
@stop