<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--laravel CSRF 防禦--}}
    <meta name="_token" content="{{ csrf_token() }}"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        @foreach($columns as $column)
            <th scope="col">{{ $column }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @php
    $i=0;
    @endphp
    @foreach($values as $value)
        <tr>
        <th scope="row">{{ $i=$i+1 }}</th>
        @foreach($value as $v)
            <td>{{ $v }}</td>
        @endforeach
        <br>
        </tr>
    @endforeach
    </tbody>
</table>
</div>


<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<!-- https://momentjs.com/ -->
<script src="{{ asset('js/Chart.min.js') }}"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="{{ asset('js/tooplate-scripts.js') }}"></script>

<script>
    var doajax =function(){
        jQuery.ajax({
            type: 'GET',
            url: 'http://192.168.5.17:8086/query?q=select+last(%22plate%22)+from+%22test%22&db=LP&pretty=true',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(data){
                console.log(data);
            },
            error: function(xhr, type){
                alert('Ajax error!')
            }
        });
    };

    var getplate=function(){
        $.get('http://192.168.5.17:8086/query?q=select+last(%22plate%22)+from+%22test%22&db=LP&pretty=true',
            function (data) {
                console.log(data.results[0].series[0].values[0][1]);
                alert(data.results[0].series[0].values[0][1]);
            }
        );
    };

    getplate();
</script>
</body>
</html>
