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
                <a href="{{ url('templates', $template->id) }}" class="ui button">
                    <i class="unhide icon"></i>
                </a>
                <a href="{{ url('/templates/setup', $template->id) }}" class="ui button">
                    <i class="edit icon"></i>
                </a>
                {!! Form::open(['method'=>'DELETE', 'style'=>'display:inline', 'action'=>['TemplatesController@destroy', $template->id]]) !!}
                <button type="submit" class="ui button" onclick="if(!confirm('Son kararin?')){return false;};">
                    <i class="trash outline red icon"></i>
                </button>
                {!! Form::close() !!}
{{--                 <div class="ui button">
                    <i class="remove icon"></i>
                </div> --}}
            </div>
        </div>
        <div class="content" align="center">
            <div class="author">{{ $template->title }}</div>
        </div>
    </div>
    @endforeach
</div>

@stop