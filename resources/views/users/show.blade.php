@extends('app')

@section('submenu')
    @if (Auth::user()->hasRole('admin') && $user->id != Auth::user()->id)
        {!! Form::open(['method'=>'DELETE', 'action'=>['UsersController@destroy', $user->id]]) !!}

        {!! Form::submit('Kullaniciyi kaldir', [
            'class' => 'ui fluid red button',
            'onclick' => "if(!confirm('Son kararin?')){return false;};" ]) !!}

        {!! Form::close() !!}
    @endif
@stop

@section('content')
    <h1 class="ui center aligned icon header">
        <i class="circular user icon"></i>
        {{ $user->fullname }}
        <div class="sub header">{{ $user->ogrno }}</div>
    </h1>

    @if ($user->id == Auth::user()->id && $user->hasRole('admin'))
        <h4 class="ui horizontal header divider" style="margin-top:40px; margin-bottom: 40px">
            <i class="bar chart icon"></i> Statistics
        </h4>
        <div class="ui three column divided equal height grid" style="text-align:center">
            {{-- SERTIFIKA --}}
            <div class="column">
            <div class="ui top attached teal segment">
                <div class="ui header">Sertifikalar</div>
            </div>
            <div class="ui attached segment">
                <h1 class="ui header" style="font-size:3.5em">{{ \App\Template::count() }}</h1>
                <div class="ui vertical mini fluid buttons">
                    <div class="ui button">yenisini ekle</div>
                    <div class="ui teal button">hepsini göster</div>
                </div>
            </div>
            </div>

            {{-- KURSLAR --}}
            <div class="column">
            <div class="ui top attached red segment">
                <div class="ui header">Kurslar</div>
            </div>
            <div class="ui attached segment">
                <h1 class="ui header" style="font-size:3.5em">{{ \App\Course::count() }}</h1>
                <div class="ui vertical mini fluid buttons">
                    <div class="ui button">yenisini ekle</div>
                    <div class="ui red button">hepsini göster</div>
                </div>
            </div>
            </div>

            {{-- KULLANICILAR --}}
            <div class="column">
            <div class="ui top attached green segment">
                <div class="ui header">Kullanıcılar</div>
            </div>
            <div class="ui attached segment">
                <h1 class="ui header" style="font-size:3.5em">{{ \App\User::count() }}</h1>
                <div class="ui vertical mini fluid buttons">
                    <div class="ui button">yenisini ekle</div>
                    <div class="ui green button">hepsini göster</div>
                </div>
            </div>
            </div>
        </div>
    @else
        <h4 class="ui horizontal header divider" style="margin-top:40px; margin-bottom: 40px">
            <img src="/img/school.png"> Katildigi kurslar
        </h4>

        @if (count($user->courses) > 0)
            <div class="ui selection animated list">
            @foreach($user->courses as $course)
            <div class="item">
                <a href="{{ url('awards/show', array($course->slug, $user->ogrno)) }}" class="right floated compact ui button"><i class="file pdf outline icon"></i>Belgeni al</a>
                <div class="content">
                    <div class="header">{{ $course->title }}</div>
                </div>
            </div>
            @endforeach
            </div>

            <div class="ui divider"></div>
            <div align="center"><a href="{{ url('awards/hepsi', array($user->id)) }}" class="ui small button" style="margin-top:20px; margin-bottom: 20px"><i class="download icon"></i>Hepsini indir</a></div>
        @else
            <div class="ui center aligned red header" style="margin-top:40px; margin-bottom: 40px">No course found</div>
        @endif
    @endif


    @if ($user->id == Auth::user()->id)
    <div class="ui secondary segment" align="right">
        &sdot;
        <a href="/users/edit">Edit profile</a>
        &sdot;
        <a href="/auth/logout">Çıkış yap</a>
        &sdot;
    </div>
    @endif
@stop