@extends('layout.default')
@section('content')
<div class="" id="home">
    <div class="container mt-5">
        <div class="row tm-content-row">
            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <h2 class="tm-block-title">停車地點</h2>
                    <p class="text-white">選擇</p>
                    <select class="custom-select">
                        <option value="0">管理院區</option>
                        <option value="1">-</option>
                        <option value="2">-</option>
                        <option value="3">-</option>
                        <option value="4">-</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row tm-content-row">
            <div class="tm-block-col tm-col-avatar">
                <div class="tm-bg-primary-dark tm-block tm-block-avatar">
                    <h2 class="tm-block-title">證件照</h2>
                    <div class="tm-avatar-container">
                        <img
                                src="img/avatar.png"
                                alt="Avatar"
                                class="tm-avatar img-fluid mb-4"
                        />
                        <a href="#" class="tm-avatar-delete-link">
                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </div>
                    <button class="btn btn-primary btn-block text-uppercase">
                        證件照上傳
                    </button>
                </div>
            </div>
            <div class="tm-block-col tm-col-account-settings">
                <div class="tm-bg-primary-dark tm-block tm-block-settings">
                    <h2 class="tm-block-title">帳戶資料</h2>
                    <form action="" class="tm-signup-form row">
                        <div class="form-group col-lg-6">
                            <label for="name">姓名</label>
                            <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    class="form-control validate"
                                    data-toggle="tooltip"
                                    title="請輸入姓名"
                                    
                            />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">電子郵件</label>
                            <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    class="form-control validate"
                                    data-toggle="tooltip"
                                    title="請輸入郵件信箱"
                                    
                            />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="ID">教師編號</label>
                            <input
                                    id="ID"
                                    name="ID"
                                    type="text"
                                    class="form-control validate"
                                    data-toggle="tooltip"
                                    title="請輸入教師編號"
                                    
                            />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="plate">車牌號碼</label>
                            <input
                                    id="plate"
                                    name="plate"
                                    type="text"
                                    class="form-control validate"
                                    data-toggle="tooltip"
                                    title="請輸入您的車牌號碼"
                                    
                            />
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label for="phone">手機號碼(XXXX-XXXXXX)</label>
                            <input
                                    id="phone"
                                    name="phone"
                                    type="tel"
                                    class="form-control validate"
                                    
                                    pattern="[0-9]{4}-[0-9]{6}" //(XXXX-XXXXXX)
                                    data-toggle="tooltip"
                                    title="請輸入您的手機號碼"
                            />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="phone-school">校內分機(XXXX)</label>
                            <input
                                    id="phone"
                                    name="phone"
                                    type="tel"
                                    pattern="[0-9]{4}"  //預設4位數
                                    class="form-control validate"
                                    data-toggle="tooltip"
                                    title="請輸入您在校內的分機"
                                    
                            />
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="tm-hide-sm">&nbsp;</label>
                            <button
                                    type="submit"
                                    class="btn btn-primary btn-block text-uppercase"
                            >
                                資料上傳
                            </button>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="tm-hide-sm">&nbsp;</label>
                            <button
                                    //value="refresh"  //F5 
                                    class="btn btn-danger btn-block text-uppercase"
                                    onclick="location.reload()"
                            >
                                重置
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
@endsection

