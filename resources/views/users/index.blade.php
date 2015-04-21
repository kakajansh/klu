@extends('app')

@section('content')
    <div class="ui selection list">
    @foreach($users as $user)
        <a href="{{ url('users', $user->id) }}" class="item">
            <div class="content">
                <div class="header">{{ $user->ad }} {{ $user->soyad }} </div>
            </div>
        </a>
    @endforeach
    </div>
@stop