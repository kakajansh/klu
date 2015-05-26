@extends('app')

@section('content')
    <div class="ui selection list">
    @foreach($users as $user)
        <a href="{{ url('users', $user->id) }}" class="item">
            @if ($user->id == Auth::user()->id)
                <div class="right floated ui mini label">Current user</div>
            @endif
            @if ($user->id == Auth::user()->id)
                <div class="right floated ui mini label">Admin</div>
            @endif
            <div class="content">
                <div class="header">{{ $user->ad }} {{ $user->soyad }}</div>
            </div>
        </a>
    @endforeach
    </div>
@stop