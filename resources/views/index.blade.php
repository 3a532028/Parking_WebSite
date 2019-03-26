@extends('layout.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('content')
<div class="" id="home">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
            </div>
        </div>
        <!-- row -->
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                <div class="embed-responsive embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item"
                            src="http://192.168.5.17:3000/d/2qwA9x3mz/demo?orgId=1&fullscreen&panelId=2"></iframe>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                <div class="embed-responsive embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item"
                            src="http://192.168.5.17:3000/d/2qwA9x3mz/demo?orgId=1&fullscreen&panelId=4"></iframe>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                <div class="embed-responsive embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item"
                            src="http://192.168.5.17:3000/d/2qwA9x3mz/demo?panelId=6&fullscreen&tab=visualization&orgId=1"></iframe>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                <div class="tm-bg-primary-black tm-block tm-block-taller tm-block-overflow">
                    <h2 class="tm-block-title">汽車快照</h2>
                    <div class="tm-notification-items">
                        @foreach($lps as $lp)
                        <div class="media tm-notification-item-dark">
                            <div class="tm-gray-circle"><img src="{{ asset('img/car/'.$lp->id.'.jpeg') }}" alt="Avatar Image" class="rounded-circle" width="80px" height="80px"></div>
                            <div class="media-body">
                                <p class="mb-2">{{ $lp->LP }}</p>
                                <span class="tm-small tm-text-color-secondary">{{ $lp->status }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-black tm-block tm-block-taller tm-block-scroll">
                    <h2 class="tm-block-title">車輛管理</h2>
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">車牌號碼</th>
                            <th scope="col">最近進入時間</th>
                            <th scope="col">最後離開時間</th>
                            <th scope="col">狀態</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lps as $lp)
                        <tr>
                            <th scope="row"><b>{{ $lp->LP }}</b></th>
                            <td>
                                {{--<div class="tm-status-circle cancelled">--}}
                                {{--</div>Moving--}}
                                {{ $lp->enter_t }}
                            </td>
                            <td><b>{{ $lp->out_t }}</b></td>
                            <td><b>{{ $lp->status }}</b></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-black tm-block tm-block-taller tm-block-scroll">
                    <div class="row">
                    <h2 class="tm-block-title">當前進入車輛</h2>
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">進入時間</th>
                            <th scope="col">車牌號碼</th>
                            <th scope="col">快照</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row" id="inter-time">
                                times
                            </th>
                            <td id="inter-lp">
                                lp
                            </td>
                            <td>
                                <img id="inter-img" src="">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div>
                        <h2 class="tm-block-title">當前離開車輛</h2>
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">離開時間</th>
                                <th scope="col">車牌號碼</th>
                                <th scope="col">快照</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" id="inter-time">
                                    times
                                </th>
                                <td id="inter-lp">
                                    lp
                                </td>
                                <td>
                                    <img id="inter-img" src="">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="embed-responsive embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" src="http://192.168.5.17:3000/d/w1sqqajik/srs-telegraf?orgId=1&refresh=5s&from=now-1h&to=now&fullscreen&panelId=65089"></iframe>
            </div>


        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/moment.min.js') }}"></script>
<!-- https://momentjs.com/ -->
<script src="{{ asset('js/Chart.min.js') }}"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="{{ asset('js/tooplate-scripts.js') }}"></script>
<script>
    document.body.style.background = '#090909';

</script>
<script>
        var interval=1000;
        var doAjax = function() {
            $.ajax({
                url: 'http://192.168.5.17:8086/query?q=select+last(%22plate%22)+from+%22test%22&db=LP&pretty=true',
                success: function(data){
                    document.getElementById("inter-time").innerHTML=data.results[0].series[0].values[0][0];
                    document.getElementById("inter-lp").innerHTML=data.results[0].series[0].values[0][1];
                    console.log(innerHTML=data.results[0].series[0].values[0][1]);
                },
                complete: function () {
                    // Schedule the next
                    setTimeout(doAjax, interval);
                }
            });
        };

        var getplate=function(){
            $.ajax({
               url: 'http://192.168.5.17:8086/query?q=select+last(plate)%2C*+from+%22result%22&db=mydb&pretty=true',
               success:function (data) {
                   var time=data.results[0].series[0].values[0][0];
                   var img=data.results[0].series[0].values[0][1];
                   var lp=data.results[0].series[0].values[0][3];
                   document.getElementById("inter-time").innerHTML = time.split(".")[0];
                   document.getElementById('inter-img').src =' http://192.168.5.53:8001/result?filename='+img;
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
{{--Chart js--}}
<script>
    var config = {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: '#FF0000',
                borderColor: '#FF0000',
                data: [10, 30, 39, 20, 25, 34, -10],
                fill: false,
            }, {
                label: 'My Second dataset',
                fill: false,
                backgroundColor: '#0000FF',
                borderColor: '#0000FF',
                data: [18, 33, 22, 19, 11, 39, 30],
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Grid Line Settings'
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: ['pink', 'red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'purple']
                    },
                    ticks: {
                        min: 0,
                        max: 100,
                        stepSize: 10
                    }
                }]
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById('pieVehicleCounter').getContext('2d');
        window.myLine = new Chart(ctx, config);
    };
</script>
@endsection
