@extends('layout.default')

@section('content')
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-12 mx-auto tm-login-col">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="tm-block-title mb-4">歡迎登入</h2>
                            @if(!empty($msg))
                                <div class="alert alert-danger">
                                    {{ $msg }}
                                </div>
                                @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form action="{{ route('login') }}" method="post" class="tm-login-form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username">帳號</label>
                                    <input
                                            name="username"
                                            type="text"
                                            class="form-control validate"
                                            id="username"
                                            value=""
                                            required
                                    />
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password">密碼</label>
                                    <input
                                            name="password"
                                            type="password"
                                            class="form-control validate"
                                            id="password"
                                            value=""
                                            required
                                    />
                                </div>
                                <div class="form-group mt-4">
                                    <button
                                            type="submit"
                                            class="btn btn-primary btn-block text-uppercase"
                                    >
                                        登入
                                    </button>
                                </div>
                                <button type="button" class="mt-5 btn btn-primary btn-block text-uppercase " data-toggle="modal" data-target="#msg">
                                    忘記密碼了嗎?
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">提示</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                請聯絡管理人員 分機號碼#5960
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">確定</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('script')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <!-- https://momentjs.com/ -->
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="{{ asset('js/tooplate-scripts.js') }}"></script>
@endsection
