@extends('layout.default')

@section('content')
    <div class="container mt-5">
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table">
                            <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">PRODUCT NAME</th>
                                <th scope="col">UNIT SOLD</th>
                                <th scope="col">IN STOCK</th>
                                <th scope="col">EXPIRE DATE</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- table container -->

                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
                    <h2 class="tm-block-title">Product Categories</h2>
                    <div class="tm-product-table-container">
                        <table class="table tm-table-small tm-product-table">
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- table container -->
                </div>
            </div>
        </div>
    </div>

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
@endsection