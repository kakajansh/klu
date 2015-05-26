<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kirklareli</title>

	<link href="{{ asset('/semantic/semantic.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>

<div class="ui main header"></div>
<div class="ui icon center aligned submain header">
    <i class="circular bug inverted red icon"></i>KLUCER
    <div class="sub header">KLU Certificate Manager</div>
</div>
<div class="ui page grid">
    <div class="column"><br>

    @if (Authority::can('multi', 'App\Awards'))

    <div class="ui labeled icon fluid four item menu">
        <a href="{{ url('templates') }}" class="orange {{ Request::is( 'templates') ? 'active' : '' }} item">
            <i class="map icon"></i>Sertifikalar
        </a>
        <a href="{{ url('courses') }}" class="teal {{ Request::is( 'courses') ? 'active' : '' }} item">
            <i class="star icon"></i>Kurslar
        </a>
        <a href="{{ url('users') }}" class="green {{ Request::is( 'users') ? 'active' : '' }} item">
            <i class="picture icon"></i>Ogrenciler
        </a>
        <a href="{{ url('/') }}" class="red {{ Request::is( '/') ? 'active' : '' }} item">
            <i class="user icon"></i>{{ \Auth::user()->ad }}
        </a>
    </div>

    @yield('submenu')
    @endif

    <div class="ui segment">
		@yield('content')
	</div>
	</div>
</div>

<!-- Scripts -->
@if (Authority::can('multi', 'App\Awards'))
<script src="{{ asset('jquery.min.js') }}"></script>
<script src="{{ asset('semantic/dist/semantic.js') }}"></script>
<script src="{{ asset('fabric/dist/fabric.js') }}"></script>
@yield('scripts')
@endif

</body>
</html>
