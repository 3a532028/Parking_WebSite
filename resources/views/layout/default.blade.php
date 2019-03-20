<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--laravel CSRF 防禦--}}
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/video.js/6.6.2/video-js.min.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.6.2/video.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.6.2/ie8/videojs-ie8.min.js"></script>
    <!-- videojs-flash -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-flash/2.1.0/videojs-flash.min.js"></script>
    <script>
        videojs.options.flash.swf = "https://cdnjs.cloudflare.com/ajax/libs/video.js/6.6.2/video-js.swf"
    </script>
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>
</head>
<body id="{{ $body }}">
@include('layout.navbar')

<div class="container">
    @section('content')
        內容~內容~內容
    @show
</div>


<script>
    //easy-sidebar-toggle-right
    $('.easy-sidebar-toggle').click(function(e) {
        e.preventDefault();
//$('body').toggleClass('toggled-right');
        $('body').toggleClass('toggled');
//$('.navbar.easy-sidebar-right').removeClass('toggled-right');
        $('.navbar.easy-sidebar').removeClass('toggled');
    });
</script>
<footer class="footer navbar-fixed-bottom">
    @include('layout.footer')
</footer>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

@section('script')
    內容~內容~內容
@show
</body>
</html>
