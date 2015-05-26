<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="{{ asset('/semantic/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">

    <!-- <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> -->

    <!-- Fonts -->
    <!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="ui two column full stackable grid" style="padding: 0px; margin: 0px">
    <div class="sag full column">
        <div class="elem" align="center">
            @include('partials.sonkurslar')
        </div>
    </div>
    <div class="sol full nopad column">
        <div class="elem" style="padding:4rem 6.5rem">
            @yield('content')
        </div>
        <div class="ui secondary footer segment" style="">
            @include('partials.dogrulama')
        </div>
    </div>
</div>

</body>
</html>
