@extends('app')

@section('submenu')
<div class="ui fluid two item menu">
  <a href="{{ url('templates') }}" class="{{ Request::is( 'templates') ? 'active' : '' }} item">Hepsini Listele</a>
  <a href="{{ url('templates/create') }}" class="{{ Request::is( 'templates/create') ? 'active' : '' }} item">Yenisini Ekle</a>
</div>
@stop

@section('content')

<div class="ui two cards">
    @foreach($templates as $template)
    <div class="ui red card">
        <div class="image" align="center">
            <a href="{{ url('/templates', $template->id) }}">
                <img href="{{ url('/templates', $template->id) }}" src="{{ $template->thumb }}" width="100%">
            </a>
            <div class="ui icon buttons">
                <div class="ui button">
                    <i class="unhide icon"></i>
                </div>
                <a href="{{ url('/templates/setup', $template->id) }}" class="ui button">
                    <i class="edit icon"></i>
                </a>
                <div class="ui button">
                    <i class="remove icon"></i>
                </div>
            </div>
        </div>
        <div class="content" align="center">
            <div class="author">{{ $template->title }}</div>
        </div>
    </div>
    @endforeach
</div>

@stop