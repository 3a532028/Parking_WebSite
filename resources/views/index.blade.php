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
                <div class="tm-bg-primary-dark tm-block">
                    <h2 class="tm-block-title">Latest Hits</h2>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                <div class="tm-bg-primary-dark tm-block">
                    <h2 class="tm-block-title">Performance</h2>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-taller">
                    <h2 class="tm-block-title">Storage Information</h2>
                    <div id="pieChartContainer">
                        <canvas id="pieChart" class="chartjs-render-monitor" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                    <h2 class="tm-block-title">Notification List</h2>
                    <div class="tm-notification-items">
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                            <div class="media-body">
                                <p class="mb-2"><b>Jessica</b> and <b>6 others</b> sent you new <a href="#"
                                                                                                   class="tm-notification-link">product updates</a>. Check new orders.</p>
                                <span class="tm-small tm-text-color-secondary">6h ago.</span>
                            </div>
                        </div>
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle"><img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle"></div>
                            <div class="media-body">
                                <p class="mb-2"><b>Oliver Too</b> and <b>6 others</b> sent you existing <a href="#"
                                                                                                           class="tm-notification-link">product updates</a>. Read more reports.</p>
                                <span class="tm-small tm-text-color-secondary">6h ago.</span>
                            </div>
                        </div>
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle"><img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle"></div>
                            <div class="media-body">
                                <p class="mb-2"><b>Victoria</b> and <b>6 others</b> sent you <a href="#"
                                                                                                class="tm-notification-link">order updates</a>. Read order information.</p>
                                <span class="tm-small tm-text-color-secondary">6h ago.</span>
                            </div>
                        </div>
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                            <div class="media-body">
                                <p class="mb-2"><b>Laura Cute</b> and <b>6 others</b> sent you <a href="#"
                                                                                                  class="tm-notification-link">product records</a>.</p>
                                <span class="tm-small tm-text-color-secondary">6h ago.</span>
                            </div>
                        </div>
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle"><img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle"></div>
                            <div class="media-body">
                                <p class="mb-2"><b>Samantha</b> and <b>6 others</b> sent you <a href="#"
                                                                                                class="tm-notification-link">order stuffs</a>.</p>
                                <span class="tm-small tm-text-color-secondary">6h ago.</span>
                            </div>
                        </div>
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle"><img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle"></div>
                            <div class="media-body">
                                <p class="mb-2"><b>Sophie</b> and <b>6 others</b> sent you <a href="#"
                                                                                              class="tm-notification-link">product updates</a>.</p>
                                <span class="tm-small tm-text-color-secondary">6h ago.</span>
                            </div>
                        </div>
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                            <div class="media-body">
                                <p class="mb-2"><b>Lily A</b> and <b>6 others</b> sent you <a href="#"
                                                                                              class="tm-notification-link">product updates</a>.</p>
                                <span class="tm-small tm-text-color-secondary">6h ago.</span>
                            </div>
                        </div>
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle"><img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle"></div>
                            <div class="media-body">
                                <p class="mb-2"><b>Amara</b> and <b>6 others</b> sent you <a href="#"
                                                                                             class="tm-notification-link">product updates</a>.</p>
                                <span class="tm-small tm-text-color-secondary">6h ago.</span>
                            </div>
                        </div>
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle"><img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle"></div>
                            <div class="media-body">
                                <p class="mb-2"><b>Cinthela</b> and <b>6 others</b> sent you <a href="#"
                                                                                                class="tm-notification-link">product updates</a>.</p>
                                <span class="tm-small tm-text-color-secondary">6h ago.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <h2 class="tm-block-title">車輛管理</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">車牌號碼</th>
                            <th scope="col">最近進入時間</th>
                            <th scope="col">最後離開時間</th>
                            <th scope="col">白名單</th>
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
                            <td><b>
                                    @php
                                        if($lp->is_white==0){
                                        echo '<div class="tm-status-circle cancelled"></div>';
                                        echo $lp->is_white;
                                        }
                                    @endphp
                                </b></td>
                            <td><b>{{ $lp->status }}</b></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-6 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <h2 class="tm-block-title">當前進入車輛</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">進入時間</th>
                            <th scope="col">車牌號碼</th>
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
                            </tr>
                        </tbody>
                    </table>
                </div>
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
    Chart.defaults.global.defaultFontColor = 'white';
    let ctxLine,
        ctxBar,
        ctxPie,
        optionsLine,
        optionsBar,
        optionsPie,
        configLine,
        configBar,
        configPie,
        lineChart;
    barChart, pieChart;
    // DOM is ready
    $(function () {
        drawLineChart(); // Line Chart
        drawBarChart(); // Bar Chart
        drawPieChart(); // Pie Chart

        $(window).resize(function () {
            updateLineChart();
            updateBarChart();
        });
    })
</script>
<script>
        var getplate=function(){
            $.get('http://192.168.5.17:8086/query?q=select+last(%22plate%22)+from+%22test%22&db=LP&pretty=true',
                function (data) {
                    // console.log(data.results[0].series[0].values[0][1]);
                    document.getElementById("inter-time").innerHTML=data.results[0].series[0].values[0][0];
                    document.getElementById("inter-lp").innerHTML=data.results[0].series[0].values[0][1];
                }
            );
        };

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
        doAjax();
</script>
@endsection
