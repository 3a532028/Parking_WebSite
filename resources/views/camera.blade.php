@extends('layout.default')

@section('content')
    <div class="container mt-5">
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="row">
                        <div class="col-sm-8">
                            <form name='form' id='form' class="form-inline">
                                <input style="width: 280px" type='text' name='name' id='src'  class="form-control mr-sm-2" placeholder="切換網址"/>
                                <input class="btn btn-outline-warning my-2 my-sm-0" type='button' name='submit' value='切換' onclick='processFormData();' />
                            </form>
                        </div>
                        <div class="col-sm">
                            <span id="RtmpName" class="btn btn-info"  style="width: auto;text-align: center;font-weight:bold;">Rtmp-Play0</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <button class="btn btn-primary btn-block text-uppercase rounded" onclick="inter_stream()">
                                入口
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-primary btn-block text-uppercase rounded" onclick="outer_stream()">
                                出口
                            </button>
                        </div>
                    </div>
       
                    <br>
                    <div class="embed-responsive embed-responsive-4by3">
                        <video id="my-video" class="video-js embed-responsive-item" data-setup='{ "autoplay" : true , "controls" : "true" , "poster" : "true" , "preload" : "auto"  }'>
                            <source  id = "url" src = "rtmp://192.168.5.17:1935/live/in"  type='rtmp/flv'>

                            <p class="vjs-no-js">
                                <!-- 如果使用者不支援JavaScript，顯示這段-->
                                To view this video please enable JavaScript, and consider upgrading to a web browser that
                                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                            </p>
                        </video>
                    </div>

                    <h3 id="AreaBox" class ='font-weight-bold col-6'>入口</h3>
                    <br>
                </div>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-4 col-xl-4 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    {{--<h2 class="tm-block-title">Product Categories</h2>--}}

                    <h1 id= "RtmpName"></h1>
                    <div class="list-group">
                        {{--<div class="btn-group-vertical">--}}
                            {{--<button class="btn btn-primary btn-block text-uppercase rounded" onclick="ShowArea0()">--}}
                                {{--Camera 1--}}
                            {{--</button>--}}
                            {{--<button class="btn btn-primary btn-block text-uppercase rounded"onclick="ShowArea1()">--}}
                                {{--Camera 2--}}
                            {{--</button>--}}
                        {{--</div>--}}
                        <div class="card card-outline-secondary my-4">
                            <div class="card-header text-center font-weight-bold">
                                辨識結果
                            </div>
                            <div class="card-body">
                                <p class = 'font-weight-bold'>車牌影像：</p>
                                {{--<small class="text-muted">123</small>--}}
                                <td>
                                    <img  style="width: 70%" id="img" src="">
                                </td>
                                <hr>
                                <p class = 'font-weight-bold t'>車牌字符：</p>
                                {{--<small class="text-muted text-center">456</small>--}}
                                <td >
                                    <p id="lp">lp</p>
                                </td>
                                <hr>
                                <p class = 'font-weight-bold'>時間：</p>
                                {{--<small class="text-muted">789</small>--}}
                                <th scope="row">
                                    <p id ='time'>time</p>
                                </th>
                                <hr>
                                <p class = 'font-weight-bold'>管院車輛剩餘：</p>
                                <div id="free-parking-space" class="alert alert-info"style="font-size: 40px;text-align: center;margin: 30px" role="alert">
                                    {{$Cars}}
                                </div>
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
    {{--<th scope="col">{{ $columns }}</th>--}}
    {{--<th scope="col">{{ $values }}</th>--}}
@endsection

@section('script')
    {{--<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>--}}
    {{--<!-- https://jquery.com/download/ -->--}}
    {{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
    {{--<!-- https://getbootstrap.com/ -->--}}
    <script>
        $(function() {
            $(".tm-product-name").on("click", function() {
                window.location.href = "edit-product.html";
            });
        });
    </script>
    {{--自動更新 辨識結果 剩餘車位數--}}
    <script>
        var stream="inter";
        var interval=1000;
        var getplate = function(){
            if (stream === "inter"){
                $.ajax({
                    url: 'http://192.168.5.17:8086/query?q=select+last(plate)%2C*+from+%22in%22&db=NCUT_MM&pretty=true',
                    success:function (data) {
                        var time=data.results[0].series[0].values[0][0].split(".")[0];
                        var img=data.results[0].series[0].values[0][1];
                        var lp=data.results[0].series[0].values[0][3];
                        let UTCTimeObj = new Date(time=time+'z');
                        document.getElementById("time").innerHTML = UTCTimeObj.toLocaleString();
                        document.getElementById('img').src='http://192.168.5.53:8001/result?filename='+img;
                        document.getElementById("lp").innerHTML = lp;
                    },
                    complete: function () {
                        // Schedule the next
                        setTimeout(getplate, interval);
                    }
                });
            }else if (stream === "outer"){
                $.ajax({
                    url: 'http://192.168.5.17:8086/query?q=select+last(plate)%2C*+from+%22out%22&db=NCUT_MM&pretty=true',
                    success:function (data) {
                        var time=data.results[0].series[0].values[0][0].split(".")[0];
                        var img=data.results[0].series[0].values[0][1];
                        var lp=data.results[0].series[0].values[0][3];
                        let UTCTimeObj = new Date(time=time+'z');
                        document.getElementById("time").innerHTML = UTCTimeObj.toLocaleString();
                        document.getElementById('img').src =' http://192.168.5.53:8001/result?filename='+img;
                        document.getElementById("lp").innerHTML = lp;
                    },
                    complete: function () {
                        // Schedule the next
                        setTimeout(getplate, interval);
                    }
                });
            }

        };
        var freespace=function(){
            $.ajax({
                url: '/free/parking/space',
                success:function (data) {
                    document.getElementById("free-parking-space").innerText=data;
                },
                complete: function () {
                    // Schedule the next
                    setTimeout(freespace, interval);
                }
            });
        };
        freespace();
        getplate();
    </script>
    {{--串流切換--}}
    <script>
        function inter_stream() {
            document.getElementById("AreaBox").innerHTML='入口';
            document.getElementById("RtmpName").innerHTML='Rtmp-Play0';
            let player=videojs("my-video");
            player.src("rtmp://192.168.5.17:1935/live/in");
            player.play();
            stream="inter";
        }
        function outer_stream() {
            document.getElementById("AreaBox").innerHTML='出口';
            document.getElementById("RtmpName").innerHTML='Rtmp-Play1';
            let player=videojs("my-video");
            player.src("rtmp://192.168.5.17:1935/live/out");
            player.play();
            stream="outer";
        }
        function processFormData() {
            document.getElementById("AreaBox").innerHTML='自定義';
            document.getElementById("RtmpName").innerHTML='Rtmp-Play2';
            var name_element = document.getElementById('src');
            var src = name_element.value;
            alert('你的網址是' + src);
            let player=videojs("my-video");
            player.src(src);
            player.play();
        }
    </script>
@endsection