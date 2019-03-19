@extends('layout.default')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function ajaxget(url='{{url('iswhite/seletall')}}')
        {
            $.ajax({
                type: 'get',
                url: url,
                dataType: 'Json',
                success: function (data) {
                    var str='';
                    var LP = [];
                    var enter_t = [];
                    var out_t = [];
                    var is_white = [];
                    var status = [];
                    var iswhite=[];
                    var hours=[];
                    var mins=[];
                    for (i in data) {
                        LP.push(data[i].LP);
                        data[i].enter_t
                        enter_t.push(data[i].enter_t);
                        out_t.push(data[i].out_t);
                        hours.push(parseInt((new Date() - new Date(data[i].enter_t))/1000/3600));
                        mins.push(parseInt((new Date() - new Date(data[i].enter_t))/1000/60-parseInt((new Date() - new Date(data[i].enter_t))/1000/60/60)*60));
                        is_white.push(data[i].is_white);
                        status.push(data[i].status);
                        iswhite.push(data[i].is_white);
                    }
                    if (LP.length == 0){
                        alert('查無結果');
                        str+='查無結果';
                    }
                    for (i =0 ; i < LP.length;i++){
                        str+=" <tr>\n" +
                            "            <th scope=\"row\"><b>"+LP[i]+"</b></th>\n" +
                            "            <td>\n";
                        if(status[i]=="已進場"){str+="<div id=\"status\" class=\"tm-status-circle parking\">"}
                        else if(status[i]=="未進場"){str+="<div id=\"status\" class=\"tm-status-circle unparking\">"}
                        else if(status[i]=="已過夜停車!"){str+="<div id=\"status\" class=\"tm-status-circle cancelled\">"}
                        else if(status[i]=="黑名單"){str+="<div id=\"status\" class=\"tm-status-circle cancelled2\">"}
                        str+=
                            "                </div>"+status[i]+"\n" +
                            "            </td>\n";
                        if(!(enter_t[i]==null) && (hours[i]>0)){
                            str+="<td><b>"+hours[i]+"小時"+mins[i]+"分鐘</b></td>\n" +
                                " <td><b>"+enter_t[i]+"</b></td>\n";
                        }
                        else if(!(enter_t[i]==null)){
                            str+="<td><b>"+mins[i]+"分鐘</b></td>\n" +
                                " <td><b>"+enter_t[i]+"</b></td>\n";
                        }
                        else {
                            str+="<td><b></b></td>\n" +
                                " <td><b></b></td>\n";
                        }

                        str+="            <td><b>"+out_t[i]+"</b></td>\n" +
                             "            <td>\n";
                        if (iswhite[i]){str+="<input class=\"btn btn-info rounded\" type=\"button\" value=\"白名單\" style=\"font-size: 12pt;height:auto;width: 150px;text-align: center;font-weight:bold;\">";}
                        else {str+="<input onclick=\"unban(\'"+LP[i]+"\')\" class=\"btn btn-dark rounded\" type=\"button\" value=\"取消黑名單\" style=\"font-size: 12pt;height:auto;width: 150px;text-align: center;font-weight:bold;\">";}
                        str+= "</td>\n" +
                            "</tr>";
                    }
                    console.log(LP,enter_t,out_t,is_white,status);
                    document.getElementById("result").innerHTML= str;
                }
        });
        }
        $(document).ready(function(){ajaxget()});
    </script>

    <script>
        function sort(id) {
             var span=document.getElementById(id);
             span.classList.add('text-primary');
             span.classList.remove('text-dark');
             url='{{url('iswhite/')}}'+'/'+id
             ajaxget(url);

             var a=['ent','unent','over','ban'];
             for (i in a){
                 if (a[i] == id){
                     continue;
                 }
                 var other_span=document.getElementById(a[i]);
                 other_span.classList.add('text-dark');
                 other_span.classList.remove('text-primary');
             }
        }
        function find(id) {
            var text=document.getElementById("Lps").value.toUpperCase();
            if (text == '' || text == undefined || text == null){
               ajaxget();
            }
            else{
                url='{{url('iswhite/')}}'+'/'+id+'/'+text;
                ajaxget(url);
            }
        }
        function unban(LP) {
            var path="/iswhite/setting/"+LP;
            var form = document.createElement("form");
            form.setAttribute("method","get");
            form.setAttribute("action",path);
            document.body.appendChild(form);
            form.submit();
        }
    </script>

    <div class="container-fluid" style="background-color: #435c70;">
        <div class="row">
            <div class="col-4"></div>
        <div class="col-4">
            <div class="input-group mb-3" style="margin-top: 30px">
                <input id="Lp" type="text" class="form-control text-uppercase" placeholder="車牌號碼" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2" onclick="find('search')">搜尋車牌</span>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll"style="margin-bottom: 100px">
        <h2 style="font-size: x-large" class="tm-block-title">已註冊車輛名單</h2>
        <div class="container-fluid" style="margin:0px auto; background-color: #868ba7; border-bottom-color: black">
            <span class="tm-block-title">選擇排序:&nbsp</span>
        <span class="tm-status-circle parking"></span>
        <span onclick="sort('ent')" id="ent" style="font-size: x-large" class="text-dark font-weight-bold">已進場&nbsp</span>
        <span class="tm-status-circle unparking"></span>
        <span onclick="sort('unent')" id="unent" style="font-size: x-large" class="text-dark font-weight-bold">未進場&nbsp</span>
        <span class="tm-status-circle cancelled"></span>
        <span onclick="sort('over')" id="over" style="font-size: x-large" class="text-dark font-weight-bold">已過夜停車&nbsp</span>
        <span class="tm-status-circle cancelled2"></span>
        <span onclick="sort('ban')" id="ban" style="font-size: x-large" class="text-dark font-weight-bold">黑名單&nbsp</span>
    </div>
        <form id="set_db" action="/iswhite/setting" method="POST">
            {{ csrf_field() }}
            <input id="set_LP" type="hidden" value="">
            <input id="set_status" type="hidden" value="">
            <input id="set_enter_t" type="hidden" value="">
            <input id="set_out_t" type="hidden" value="">
        </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">車牌編號</th>
            <th scope="col">STATUS</th>
            <th scope="col">已停放時間</th>
            <th scope="col">進場時間</th>
            <th scope="col">上次離場時間</th>
            <th scope="col" style="text-align: center">黑/白_名單</th>
        </tr>
        </thead>
        <tbody id="result">
        {{--<tr>--}}
            {{--<th scope="row"><b># X23512</b></th>--}}
            {{--<td>--}}
                {{--<div class="tm-status-circle parking">--}}
                {{--</div>已進場--}}
            {{--</td>--}}
            {{--<td><b>1時 23分</b></td>--}}
            {{--<td><b>2019/3/16 pm.12:04</b></td>--}}
            {{--<td><b>2019/3/15 pm.5:10</b></td>--}}
            {{--<td><input class="btn btn-info" disabled="disabled" type="button" value="白" style="width: auto;text-align: center;font-weight:bold;">--}}
                {{--<input class="btn btn-dark" type="button" value="黑" style="width: auto;text-align: center;font-weight:bold;">--}}
            {{--</td>--}}
        {{--</tr>--}}


        </tbody>
    </table>
</div>


@endsection()
