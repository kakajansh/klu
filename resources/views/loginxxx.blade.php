<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    {{-- <link href="{{ asset('/css/login.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('/semantic/semantic.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('/css/form.css') }}" rel="stylesheet"> --}}

    <!-- <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> -->

    <!-- Fonts -->
    <!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .test {
            border: 2px solid yellow !important;
        }
        .elem {
            position: relative;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
    </style>
</head>
<body>

<div class="klu-main">
    <div class="klu-header">
        <div class="elem" align="center">
            <img src="/img/logo.png" alt="Logo" width="120px" style="">
            <h2 class="ui center aligned inverted header">Kurslarimiz</h2>
            <div class="ui divider"></div>
            <div class="ui three column grid">
            <?php $sayi = 1; ?>
            @foreach($courses as $course)
              <div class="column">
                <div class="ui fluid card">
                  <div class="image">
                    <img src="/img/{{ $sayi }}.jpg" style="height: 200px">
                  </div>
                  <div class="content">
                    <a href="{{ url('courses', $course->slug) }}" class="header">{{ $course->title }}</a>
                  </div>
                </div>
              </div>
            <?php $sayi++; ?>
            @endforeach
            </div>
        </div>
    </div>

    <div class="klu-wrapper">
        <div class="klu-body">
            <div class="klu-body-inner">
                @yield('content')
            </div>
        </div>
        <div class="klu-footer">
            <div class="klu-footer-date">Bizi takip edin:<br> Kırklareli Üniversitesi</div>
            <div class="klu-share"><a href="" class="klu-share-icon" target="_blank"><img src="https://d3ptyyxy2at9ui.cloudfront.net/7e55f6919321419867c545bc8a534a62.svg"></a><a href="" class="klu-share-icon" target="_blank"><img src="https://d3ptyyxy2at9ui.cloudfront.net/af7fe5fceac1f5643baaaf5f5892f8ec.svg"></a><a href="" class="klu-share-icon" target="_blank"><img src="https://d3ptyyxy2at9ui.cloudfront.net/3b3bdf9e28810f12da96f1d7544d4309.svg"></a></div>
        </div>
    </div>
</div>


<script>
// $('.ui.checkbox').checkbox();
</script>

<!-- Scripts -->
<!-- <script src="{{ asset('jquery.min.js') }}"></script> -->
<!-- <script src="{{ asset('semantic/dist/semantic.js') }}"></script> -->
<!-- <script src="{{ asset('pdf.js') }}"></script> -->
<!-- // <script src="{{ asset('pdf.worker.js') }}"></script> -->
</body>
</html>
