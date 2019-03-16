@extends('layout.default')

@section('content')

<div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
    <h2 class="tm-block-title">已註冊車輛名單</h2>
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
        <tbody>
        <tr>
            <th scope="row"><b># X23512</b></th>
            <td>
                <div class="tm-status-circle parking">
                </div>已進場
            </td>
            <td><b>1時 23分</b></td>
            <td><b>2019/3/16 pm.12:04</b></td>
            <td><b>2019/3/15 pm.5:10</b></td>
            <td><input class="btn btn-info" disabled="disabled" type="button" value="白" style="width: auto;text-align: center;font-weight:bold;">
                <input class="btn btn-dark" type="button" value="黑" style="width: auto;text-align: center;font-weight:bold;">
            </td>
        </tr>

        <tr>
            <th scope="row"><b># APR7169</b></th>
            <td>
                <div class="tm-status-circle cancelled">
                </div>已過夜停車!
            </td>
            <td><b>34時 30分</b></td>
            <td><b>2019/3/16 pm.12:04</b></td>
            <td><b>2019/3/15 pm.5:10</b></td>
            <td><input class="btn btn-info" type="button" value="白" style="width: auto;text-align: center;font-weight:bold;">
                <input class="btn btn-dark" disabled="disabled" type="button" value="黑" style="width: auto;text-align: center;font-weight:bold;">
            </td>
        </tr>
        <tr>
            <th scope="row"><b># X23512</b></th>
            <td>
                <div class="tm-status-circle unparking">
                </div>未進場
            </td>
            <td><b>無</b></td>
            <td><b>無</b></td>
            <td><b>2019/3/15 pm.5:10</b></td>
            <td><input class="btn btn-info" disabled="disabled" type="button" value="白" style="width: auto;text-align: center;font-weight:bold;">
                <input class="btn btn-dark" type="button" value="黑" style="width: auto;text-align: center;font-weight:bold;">
            </td>
        </tr>
        <tr>
            <th scope="row"><b># X23512</b></th>
            <td>
                <div class="tm-status-circle cancelled2">
                </div>黑名單 3 天
            </td>
            <td><b>無</b></td>
            <td><b>無</b></td>
            <td><b>2019/3/15 pm.5:10</b></td>
            <td><input class="btn btn-info" type="button" value="白" style="width: auto;text-align: center;font-weight:bold;">
                <input class="btn btn-dark" disabled="disabled" type="button" value="黑" style="width: auto;text-align: center;font-weight:bold;">
            </td>
        </tr>
        </tbody>
    </table>
</div>


@endsection()
