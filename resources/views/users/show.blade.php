@extends('app')

@section('content')
    <h1>{{ $user->ad }} {{ $user->soyad }}</h1> &sdot; {{ $user->ogrno }}

    <div class="ui divider"></div>

    @if (Authority::can('multi', 'App\Awards'))
        <div class="ui three column divided equal height grid">
            <div class="stretched row" align="center">
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
          </div>
    @else
        <p>Katildigi kurslar: </p>

        <ul>
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
    @endif

    <div class="ui segment" align="right">
    @if ($user->id == Auth::user()->id)
        &sdot;
        <a href="/auth/logout">Şifreni değiştir</a>
        &sdot;
        <a href="/auth/logout">Çıkış yap</a>
        &sdot;
    @endif
    </div>
@stop