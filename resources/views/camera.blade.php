@extends('layout.default')

@section('content')
    <div class="container mt-5">
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <form name='form' id='form' >
                        網址：<input style="width: 280px" type='text' name='name' id='src'/>
                        <input  type='button' name='submit' value='切換' onclick='processFormData();' />
                    </form>
                    <br>
                    <div class="embed-responsive embed-responsive-4by3">
                        {{--<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>--}}
                        <video id="my-video" class="video-js embed-responsive-item" data-setup='{ "autoplay" : true , "controls" : "true" , "poster" : "true" , "preload" : "auto"  }'>
                            <source  id = "url" src = "https://3lcvhr1.yfcache.com/video.lv-play.com/live/2974950G68043rXLR_s1.flv"  type='video/flv'>
                            <p class="vjs-no-js">
                                <!-- 如果使用者不支援JavaScript，顯示這段-->
                                To view this video please enable JavaScript, and consider upgrading to a web browser that
                                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                            </p>
                        </video>
                    </div>
                    {{--<div class="row container justify-content-between ">--}}
                        {{--<button onclick="play()" class="btn btn-default rounded">Play</button>--}}
                        {{--<button onclick="pause()" class="btn btn-default rounded">Pause</button>--}}
                        {{--<button onclick="mute()" class="btn btn-default rounded">Mute</button>--}}
                        {{--<h3 id="AreaBox" class ='font-weight-bold col-6'></h3>--}}
                    {{--</div>--}}
                    <h3 id="AreaBox" class ='font-weight-bold col-6'></h3>
                    <br>
                    <div>
                        {{--<div class="embed-responsive embed-responsive-21by9">--}}
                            {{--<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>--}}
                            {{--<iframe id="my-video2" class="video-js embed-responsive-item" data-setup='{ "autoplay": true, "controls": true, "poster": "", "preload": "auto" }'>--}}
                                {{--<source  id = "url" src = ""  type='video/flv'>--}}
                                {{--<p class="vjs-no-js">--}}
                                    {{--<!-- 如果使用者不支援JavaScript，顯示這段-->--}}
                                    {{--To view this video please enable JavaScript, and consider upgrading to a web browser that--}}
                                    {{--<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>--}}
                                {{--</p>--}}
                            {{--</iframe>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-4 col-xl-4 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
                    {{--<h2 class="tm-block-title">Product Categories</h2>--}}
                    <h1 id= "RtmpName"></h1>
                    <div class="list-group">
                        <div class="btn-group-vertical">
                            <button class="btn btn-primary btn-block text-uppercase rounded" onclick="ShowArea0()">
                                Camera 1
                            </button>
                            <button class="btn btn-primary btn-block text-uppercase rounded"onclick="ShowArea1()">
                                Camera 2
                            </button>
                            <button class="btn btn-primary btn-block text-uppercase rounded"onclick="ShowArea2()">
                                Camera 3
                            </button>
                        </div>
                        <div class="card card-outline-secondary my-4">
                            <div class="card-header text-center font-weight-bold">
                                辨識結果
                            </div>
                            <div class="card-body">
                                <p class = 'font-weight-bold'>車牌影像：</p>
                                {{--<small class="text-muted">123</small>--}}
                                <td>
                                    <img id="inter-img" src="">
                                </td>
                                <hr>
                                <p class = 'font-weight-bold t'>車牌字符：</p>
                                {{--<small class="text-muted text-center">456</small>--}}
                                <td >
                                    <p id="inter-lp">lp</p>
                                </td>
                                <hr>
                                <p class = 'font-weight-bold'>時間：</p>
                                {{--<small class="text-muted">789</small>--}}
                                <th scope="row">
                                    <p id ='inter-time'>time</p>
                                </th>
                            </div>
                        </div>
                    </div>
                    <div class="tm-product-table-container">
                        <table class="table tm-table-small tm-product-table"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <th scope="col">{{ $columns }}</th>
    <th scope="col">{{ $values }}</th>

@endsection

@section('script')
    <script src="asset{{'js/jquery-3.3.1.min.js'}}"></script>
    <!-- https://jquery.com/download/ -->
    <script src="assect{{'js/bootstrap.min.js'}}"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $(".tm-product-name").on("click", function() {
                window.location.href = "edit-product.html";
            });
        });
    </script>

    <script>
        var videoPlayer = videojs( "my-video" );
        function play()
        {
            videoPlayer.play(); // 播放
        }
        function pause()
        {
            videoPlayer.pause(); // 暫停
        }
        function mute()
        {
            videoPlayer.muted( true ); // 靜音
        }
        function change(src) {
            // alert(src)
            videoPlayer.src(src);  //重置video的src
            videoPlayer.load(src);  //使video重新加载
        }
    </script>
    <script type="text/javascript">
        function ShowArea0(){
            document.getElementById("AreaBox").innerHTML='入口';
            document.getElementById("RtmpName").innerHTML='Rtmp-Play0';
            // document.getElementById("video-src").src="aaa";
            var src ='https://3geauymtsgrzdrcbzfahue.ourdvsss.com/video-ws-kk.lv-play.com/obslive/3180681G74504Sf86_s1.flv?wshc_tag=0&wsts_tag=5c920e92&wsid_tag=d348a867&wsiphost=ipdbm' ;
            change(src);
        }
        function ShowArea1(){
            document.getElementById("AreaBox").innerHTML='中島上';
            document.getElementById("RtmpName").innerHTML='Rtmp-Play1';
            var src ='https://5lcvhr1.yfcache.com/video.lv-play.com/live/2419151G34710QEKD_s1.flv';
            change(src);
        }
        function ShowArea2(){
            document.getElementById("AreaBox").innerHTML='左邊草叢';
            document.getElementById("RtmpName").innerHTML='Rtmp-Play2';
            var src ='https://8lcvhr1.yfcache.com/video.lv-play.com/live/2122256G23955Zklw_s1.flv';
            change(src);
        }
    </script>
    <script>
        function processFormData() {
            var name_element = document.getElementById('src');
            var src = name_element.value;
            // alert('你的網址是' + src);
            change(src);
        }
    </script>
    <script>
        var interval=1000;
        var doAjax = function() {
            $.ajax({
                url: 'http://192.168.5.17:8086/query?q=select+last(%22plate%22)+from+%22test%22&db=LP&pretty=true',
                success: function(data){
                    document.getElementById("inter-time").innerHTML=data.results[0].series[0].values[0][0];
                    document.getElementById("inter-lp").innerHTML=data.results[0].series[0].values[0][1];
                },
                complete: function () {
                    // Schedule the next
                    setTimeout(doAjax, interval);
                }
            });
        };

        var getplate = function(){
            $.ajax({
                url: 'http://192.168.5.17:8086/query?q=select+last(plate)%2C*+from+%22result%22&db=mydb&pretty=true',
                success:function (data) {
                    var time=data.results[0].series[0].values[0][0];
                    var img=data.results[0].series[0].values[0][1];
                    var lp = data.results[0].series[0].values[0][3];
                     document.getElementById("inter-time").innerHTML=time.split(".")[0];
                    document.getElementById('inter-img').src='http://192.168.5.53:8001/result?filename='+img;
                    document.getElementById("inter-lp").innerHTML = lp;
                },
                complete: function () {
                    // Schedule the next
                    setTimeout(getplate, interval);
                }
            });
        };
        getplate();
    </script>
@endsection