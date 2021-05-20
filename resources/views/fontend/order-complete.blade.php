@extends('layouts.fontend-main')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class="active">Order Complete</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group checkout-steps" id="accordion">

                                <div class="panel panel-default">
                                    @if(session('orderComplete'))
                                        <div class="alert alert-danger success-dismissible fade show" role="alert">
                                            <strong>{{session('orderComplete')}}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>


                            </div><!-- /.checkout-steps -->
                        </div>
                    </div><!-- /.row -->

            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme" style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3800px; left: 0px; display: block;"><div class="owl-item" style="width: 190px;"><div class="item m-t-15">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div></div><div class="owl-item" style="width: 190px;"><div class="item m-t-10">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand2.png" alt="">
                                        </a>
                                    </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand3.png" alt="">
                                        </a>
                                    </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand4.png" alt="">
                                        </a>
                                    </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand5.png" alt="">
                                        </a>
                                    </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand6.png" alt="">
                                        </a>
                                    </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand2.png" alt="">
                                        </a>
                                    </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand4.png" alt="">
                                        </a>
                                    </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div></div></div></div><!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->
                        <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->

            </div><!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div>
@endsection
