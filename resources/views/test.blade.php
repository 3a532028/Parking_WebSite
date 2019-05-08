<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.6.2/video-js.min.css" rel="stylesheet">


</head>
<body>
<h1>test video player</h1>
<video id="my-video" class="video-js embed-responsive-item" data-setup='{ "autoplay" : true , "controls" : "true" , "poster" : "true" , "preload" : "auto"  }'>
    <source id="url" src="rtmp://192.168.5.17:1935/live/in" type="rtmp/flv">
</video>

<button onclick="change()">切換</button>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{--video js 套件--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.6.2/video.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.6.2/ie8/videojs-ie8.min.js"></script>
<!-- videojs-flash -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-flash/2.1.0/videojs-flash.min.js"></script>
<script>
    function change(){
        alert("work");
        var video=videojs("my-video");
        video.src("rtmp://192.168.5.17:1935/live/rd_0");
        video.play();
    }
</script>
</body>
</html>