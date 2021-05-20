@extends('layouts.fontend-main')

@section('content')
    @if(!Session::has('cart'))
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                @if(session('orderComplete'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('orderComplete')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('delete')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="{{ route('place-order') }}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">

                            <div class="panel panel-default checkout-step-01">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" >
                                            <span>01</span>Billing Information
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="shipping_first_name">First Name <span>*</span></label>
                                                <input type="text" name="shipping_first_name" class="form-control unicase-form-control text-input @error('shipping_first_name') is-invalid @enderror" id="shipping_first_name" value="{{ Auth::user()->name }}">
                                                @error('shipping_first_name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="shipping_last_name">Last Name <span></span></label>
                                                <input type="text" name="shipping_last_name" class="form-control unicase-form-control text-input"  placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                <input type="text" name="shipping_email" value="{{ Auth::user()->email }}" class="form-control unicase-form-control text-input" id="shipping_first_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">Mobile Number <span></span></label>
                                                <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input"  placeholder="Mobile Number">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">Address <span>*</span></label>
                                                <input type="text" name="address" class="form-control unicase-form-control text-input @error('address') is-invalid @enderror"  placeholder="Your Address">
                                                @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">State / Country <span>*</span></label>
                                                <input type="text" name="state" class="form-control unicase-form-control text-input  @error('state') is-invalid @enderror"  placeholder="State">
                                                @error('state')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">Postcode / Zip <span>*</span></label>
                                                <input type="text" name="post_code" class="form-control unicase-form-control text-input  @error('post_code') is-invalid @enderror"  placeholder="Postal Code">
                                                @error('post_code')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>

                                </div>


                            </div>
<!--
                            <div class="panel panel-default checkout-step-02">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseOne">
                                            <span>02</span>Shipping Information
                                        </a>
                                    </h4>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="shipping_first_name">First Name <span>*</span></label>
                                                <input type="text" name="shipping_first_name" class="form-control unicase-form-control text-input" id="shipping_first_name" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="shipping_last_name">Last Name <span></span></label>
                                                <input type="text" name="shipping_last_name" class="form-control unicase-form-control text-input"  placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                <input type="text" name="shipping_email" value="{{ Auth::user()->email }}" class="form-control unicase-form-control text-input" id="shipping_first_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">Mobile Number <span></span></label>
                                                <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input"  placeholder="Mobile Number">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">Address <span>*</span></label>
                                                <input type="text" name="address" class="form-control unicase-form-control text-input"  placeholder="Your Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">State / Country <span>*</span></label>
                                                <input type="text" name="state" class="form-control unicase-form-control text-input"  placeholder="State">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">Postcode / Zip <span>*</span></label>
                                                <input type="text" name="post_code" class="form-control unicase-form-control text-input"  placeholder="Postal Code">
                                            </div>
                                        </div>


                                    </div>

                                </div>


                            </div>
-->
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>Checkout Method
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- guest-login -->
                                            <div class="col-md-6 col-sm-6 guest-login">
                                                <h4 class="checkout-subtitle">Guest or Register Login</h4>
                                                <p class="text title-tag-line">Register with us for future convenience:</p>

                                                <!-- radio-form  -->
                                                <form class="register-form" role="form">
                                                    <div class="radio radio-checkout-unicase">
                                                        <input id="guest" type="radio" name="text" value="guest" checked="">
                                                        <label class="radio-button guest-check" for="guest">Checkout as Guest</label>
                                                        <br>
                                                        <input id="register" type="radio" name="text" value="register">
                                                        <label class="radio-button" for="register">Register</label>
                                                    </div>
                                                </form>
                                                <!-- radio-form  -->

                                                <h4 class="checkout-subtitle outer-top-vs">Register and save time</h4>
                                                <p class="text title-tag-line ">Register with us for future convenience:</p>

                                                <ul class="text instruction inner-bottom-30">
                                                    <li class="save-time-reg">- Fast and easy check out</li>
                                                    <li>- Easy access to your order history and status</li>
                                                </ul>

                                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Continue</button>
                                            </div>
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle">Already registered?</h4>
                                                <p class="text title-tag-line">Please log in below:</p>
                                                <form class="register-form" role="form">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                                        <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
                                                        <a href="#" class="forgot-password">Forgot your Password?</a>
                                                    </div>
                                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                                                </form>
                                            </div>
                                            <!-- already-registered-login -->

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                            <!-- checkout-step-02  -->

                            <!-- checkout-step-06  -->

                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Order </h4>
                                    </div>
                                    <div class="order-details">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Course Name</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach ($carts as $cart)
                                                <tr>
                                                    <td class="product-name">
                                                        <a href="javascript::void(0)">{{  $cart->product->product_name }}</a>
                                                    </td>

                                                    <td class="product-total">
                                                        <span class="subtotal-amount">{{ $cart->price * $cart->qty }}Tk</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @if (Session::has('coupon'))
                                                <tr>
                                                    <td class="order-subtotal">
                                                        <span>Cart Subtotal</span>
                                                    </td>

                                                    <td class="order-subtotal-price">
                                                        <span class="order-subtotal-amount"><strong>{{ $subtotal }}Tk</strong></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="order-shipping">
                                                        <span>Discount</span>
                                                    </td>

                                                    <td class="shipping-price">
                                                        <span>{{ session()->get('coupon')['coupon_discount'] }}%</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="total-price">
                                                        <span>Order Total</span>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        <span class="subtotal-amount"><strong>{{ $subtotal - $discount = $subtotal *  session()->get('coupon')['coupon_discount'] / 100 }}Tk</strong></span>
                                                    </td>
                                                </tr>
                                                <input type="hidden" name="coupon_discount" value="{{ session()->get('coupon')['coupon_discount'] }}">
                                                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                                <input type="hidden" name="total" value="{{ $subtotal - session()->get('coupon')['coupon_discount'] }}">
                                                @else
                                                <tr>
                                                    <td class="total-price">
                                                        <span>Order Total</span>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        <span class="subtotal-amount"><strong>{{ $subtotal }}Tk</strong></span>
                                                        <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                                        <input type="hidden" name="total" value="{{ $subtotal }}">
                                                    </td>
                                                </tr>
                                                @endif

                                                </tbody>
                                            </table>

                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>
                                    <div class="order-details">

                                        @error('payment_type')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <!-- Default radio -->
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('payment_type') is-invalid @enderror"
                                                type="radio" value="handcash" name="payment_type" id="payment"
                                            />
                                            <label class="form-check-label" for="flexRadioDefault1"> Hand Cash </label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('payment_type') is-invalid @enderror"
                                                type="radio" value="bkash" name="payment_type" id="payment"
                                            />
                                            <label class="form-check-label" for="flexRadioDefault1"> Bkash </label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('payment_type') is-invalid @enderror"
                                                type="radio" value="rocket" name="payment_type" id="payment"
                                            />
                                            <label class="form-check-label" for="flexRadioDefault1"> Rocket </label>
                                        </div>

                                        <button type="submit" class="default-btn"><i class="fa fa-paper-plane icon-arrow before"></i><span class="label">Payment Process</span><i class="fa fa-paper-plane icon-arrow after"></i></button>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->				</div>
                </div><!-- /.row -->
                </form>
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
    @endif
@endsection
