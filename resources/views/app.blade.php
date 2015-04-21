<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/semantic/dist/semantic.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

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
        @if (\Auth::user())
        <a href="{{ url('profile') }}" class="green item">
            <i class="user icon"></i>{{ \Auth::user()->ad }}
        </a>
        @else
        <a href="{{ url('auth/login') }}" class="green item">
            <i class="user icon"></i>Profilim
        </a>
        @endif

    </div>



	@yield('submenu')

    <div class="ui segment">
		@yield('content')
	</div>
	</div>
</div>

<!-- Scripts -->
<script src="{{ asset('jquery.min.js') }}"></script>
<script src="{{ asset('semantic/dist/semantic.js') }}"></script>
<script src="{{ asset('fabric/dist/fabric.js') }}"></script>
<!-- <script src="{{ asset('pdf.js') }}"></script> -->
<!-- // <script src="{{ asset('pdf.worker.js') }}"></script> -->

@yield('scripts')

</body>
</html>
