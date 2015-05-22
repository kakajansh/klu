<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/semantic/semantic.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<div class="ui main header"></div>
<div class="ui icon center aligned submain header">
    <i class="circular bug inverted red icon"></i>KLUCER
    <div class="sub header">KLU Certificate Manager</div>
</div>
<div class="ui page grid">
    <div class="column"><br>

    @if (\Auth::user()->hasRole('admin'))

    <div class="ui labeled icon fluid five item menu">
        <a href="{{ url('/') }}" class="red {{ Request::is( '/') ? 'active' : '' }} item">
            <i class="home icon"></i>Anasayfa
        </a>
        <a href="{{ url('templates') }}" class="green {{ Request::is( 'templates') ? 'active' : '' }} item">
            <i class="map icon"></i>Sertifikalar
        </a>
        <a href="{{ url('courses') }}" class="teal {{ Request::is( 'courses') ? 'active' : '' }} item">
            <i class="star icon"></i>Kurslar
        </a>
        <a href="{{ url('users') }}" class="green item">
            <i class="picture icon"></i>Ogrenciler
        </a>
        <a href="{{ url('profile') }}" class="green item">
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
@if (\Auth::user()->hasRole('admin'))
<script src="{{ asset('jquery.min.js') }}"></script>
<script src="{{ asset('semantic/dist/semantic.js') }}"></script>
<script src="{{ asset('fabric/dist/fabric.js') }}"></script>
@yield('scripts')
@endif

</body>
</html>
