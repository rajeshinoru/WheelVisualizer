@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> @endsection @section('content')

<style>
    #footer-down {
        border: 1px solid #ccc !important;
        background: #fff !important;
    }
    
    .bbb-nl,
    .godaddy-nl,
    .reseller-nl,
    .sitelock-nl,
    .socialicons-nl,
    .verisign-nl {
        display: table-cell;
        vertical-align: middle;
        width: 16%;
        text-align: center;
    }
    
    .social2-nl {
        display: table;
        vertical-align: middle;
        position: relative;
        width: 90%;
        max-width: 1366px;
    }
    
    .googlestore {
        display: table-cell;
        vertical-align: middle;
        width: 16%;
        text-align: center;
    }
    
    .social-nl {
        margin: 40px 0px !important;
    }
    
    .footer-ratings h1 a {
        color: #777777;
        font-size: 14px !important;
        line-height: 25px;
    }
    
    .main a {
        color: #0e1661 !important;
    }
    
    .zfooterMenu ul li a:hover {
        display: inline;
        font-size: 11px;
        color: #000;
        font-weight: 700;
    }
    
    .zfooterMenu ul li a {
        display: inline;
        text-decoration: none;
        font-size: 11px;
        color: #000;
        font-weight: 700;
        padding: 2px 14px;
        border-right: 1px solid #e0e0e0;
    }
    
    .zfooterMenu ul li {
        border-left: 1px solid #e0e0e0 !important;
    }
    
    .zfooterMenu ul li {
        position: relative;
        display: inline;
    }
    
    .zfooterMenu ul {
        margin: 5px 0;
        padding: 0;
        list-style-type: none;
        border-left: 1px solid #e0e0e0;
    }
    
    .footer-ratings h1 {
        margin: 0px 0px !important;
    }
    
    .copywright {
        padding: 10px 0;
        margin-top: 5px;
        color: #666;
    }
    
    #produst,
    #special-product,
    footer,
    #bott,
    .container.brand-logo {
        display: none !important;
    }
    
    .container-fluid.home-page {
        padding: 0px 0px !important;
        background: #f1f1f1 !important;
    }
    
    #tires-size {
        padding: 40px 0px !important;
    }
    
    .size-heading p {
        color: #000;
        font-size: 12px;
    }
    
    .size-heading h1 {
        font-size: 20px !important;
    }
    
    .size-heading h2 {
        font-size: 18px !important;
    }
    
    .size-heading h3 {
        font-size: 20px !important;
        font-weight: 700;
    }
    
    .fa.fa-exclamation-circle {
        font-size: 25px;
    }
    
    .row.icon-search {
        padding: 20px 15px !important;
        border: 1px solid #eaeaea;
        border-radius: 5px !important;
    }
    
    .btn.btn-primary:hover p {
        border-right: 1px solid #fff !important;
    }
    
    .btn.btn-primary a:hover {
        text-decoration: underline;
    }
    
    .btn.btn-primary p {
        float: left !important;
        font-size: 18px !important;
        margin: 0px 0px !important;
        padding: 0px 5px !important;
        border-right: 1px solid #ccc !important;
        margin-right: 10px !important;
    }
    
    .wrapper .btn-primary {
        padding: 6px 6px;
        margin: 5px 0px !important;
        background: #fff !important;
        color: #000 !important;
        border: 1px solid #ccc !important;
        font-size: 12px !important;
        border-radius: 0px !important;
        transition: 1s all;
        border-radius: 3px;
    }
    
    .wrapper i {
        padding: 0px 10px !important;
    }
    
    .col-sm-2.size-search {
        text-align: center !important;
    }
    
    .wrapper .btn-primary a {
        color: #000 !important;
    }
    
    .wrapper .btn-primary:hover a {
        color: #fff !important;
    }
    
    .wrapper .btn-primary::before {
        content: "";
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #222222d1 !important;
        -webkit-transform: scaleX(0);
        transform: scaleX(0);
        -webkit-transform-origin: 0 50%;
        transform-origin: 0 50%;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    
    .wrapper .btn-primary:hover {
        color: #fff !important;
    }
    
    .wrapper .btn-primary {
        position: relative;
        z-index: 1;
    }
    
    .wrapper .btn-primary:hover::before {
        transform: scaleX(1);
    }
    
    .wrapper .btn-primary:hover i {
        animation-name: hvr-icon-wobble-horizontal;
        animation-duration: 1s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: 1;
    }
    .tire-slide
    {
        text-align:center;
    }
    .tire-banner .carousel-inner img
    {
        padding:17px 0px;
    }
    
    @keyframes hvr-icon-wobble-horizontal {
        16.65% {
            -webkit-transform: translateX(6px);
            transform: translateX(6px);
        }
        33.3% {
            -webkit-transform: translateX(-5px);
            transform: translateX(-5px);
        }
        49.95% {
            -webkit-transform: translateX(4px);
            transform: translateX(4px);
        }
        66.6% {
            -webkit-transform: translateX(-2px);
            transform: translateX(-2px);
        }
        83.25% {
            -webkit-transform: translateX(1px);
            transform: translateX(1px);
        }
        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }
    }
    
    @media (max-width: 767px) {
        .bbb-nl,
        .godaddy-nl,
        .reseller-nl,
        .sitelock-nl,
        .socialicons-nl,
        .verisign-nl {
            display: inline-block;
            padding: 10px 50px;
            width: auto;
            text-align: center;
        }
        .googlestore {
            vertical-align: middle;
            width: 100% !important;
            text-align: center;
            display: inline-block;
        }
        .zfooterMenu ul li {
            display: block;
            padding-top: 15px;
        }
        .zfooterMenu ul,
        .zfooterMenu ul li {
            border-left: none !important;
        }
        .zfooterMenu ul li a {
            border-right: none;
        }
        .main a {
            font-size: 10px !important;
        }
        .dropdown-menu.multi-colum-nav {
            width: 100% !important;
            background: #000 !important;
            border: none !important;
            text-align: center;
        }
        
    }
</style>

</section>

<section id="tires-size">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="size-heading">
                    <h1>WHAT TIRE SIZE IS ON YOUR VEHICLE</h1>
                    <h2>FACTORY SIZES FOR :</h2>
                    <h3>{{$vehicle->year_make_model_submodel}} {{$vehicle->dr_chassis_id}}</h3>
                </div>
            </div>
        </div>

        <div class="row icon-search">
            <div class="col-sm-9">

                <div class="col-sm-2 size-search">
                    <div class="wrapper">
<!--                         <button class="btn btn-primary">
                            <a href="{{url('/tirelist')}}">
                                <p>10"</p>215/45-17
                            </a>
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        </button> -->
                        @foreach(@$chassis_models as $key => $model)

                        <button class="btn btn-primary">
                            <a href="{{url('/tirelist')}}/{{base64_encode(@$model->tire_size)}}">
                                <p>{{getRimToWheelDiameter(@$model->rim_size)}}"</p>{{@$model->p_lt}}{{@$model->tire_size}}
                            </a>
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        </button>
                        @endforeach
                    </div>
                </div>
   <!--              <div class="col-sm-2 size-search">
                    <div class="wrapper">
                        <button class="btn btn-primary">
                            <a href="{{url('/tirelist')}}">
                                <p>12"</p>215/45-17</a><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                        <button class="btn btn-primary">
                            <a href="{{url('/tirelist')}}">
                                <p>12"</p>215/45-17</a><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                        <button class="btn btn-primary">
                            <a href="{{url('/tirelist')}}">
                                <p>12"</p>215/45-17</a><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                        <button class="btn btn-primary">
                            <a href="{{url('/tirelist')}}">
                                <p>12"</p>215/45-17</a><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                        <button class="btn btn-primary">
                            <a href="{{url('/tirelist')}}">
                                <p>12"</p>215/45-17</a><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </div>
                </div> -->
            </div>

            <div class="col-sm-3 tire-banner">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="image/image-1.png" alt="Tire" class="tire-slide">
                    </div>
                    <div class="item">
                        <img src="image/image-1.png" alt="Tire" class="tire-slide">
                    </div>
                    <div class="item">
                        <img src="image/image-1.png" alt="Tire" class="tire-slide">
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="footer-down">
    <div class="container-fluid">
        <div class="footerWrapper">
            <div class="BottomSliderHome" align="center">
                <a href=""><img src="image/foot-img.png" class="lazy ri" alt="Wheel Visualizer" width="100%" height="auto"></a>
            </div>
        </div>
    </div>
</section>

<section id="footer">

    <div class="container">
        <div class="social-nl">
            <div align="center">
                <div class="social2-nl">

                    <div class="bbb-nl">
                        <a target="_blank" href="">
                            <img class="lazy" src="image/social-1.png" style="display: inline;" width="90" height="72"></a>
                    </div>

                    <div class="reseller-nl">
                        <a href="">
                            <img class="lazy" src="image/social-2.png" style="display: inline;" height="52"></a>
                    </div>

                    <div class="googlestore">
                        <a target="_blank">
                            <img class="lazy" src="image/social-3.png" style="display: inline;" width="150" height="61"></a>
                    </div>

                    <div class="sitelock-nl">
                        <a target="_blank" href="">
                            <img class="lazy" src="image/social-4.png" style="display: inline;" width="145" height="68"></a>
                    </div>

                    <div class="godaddy-nl">
                        <a target="_blank" rel="noreferrer" href="">
                            <img class="lazy" src="image/social-5.png" style="display: inline;" width="113" height="59"></a>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div align="center">
                <div class="footer-phone">Discounted Wheel Warehouse 1-800-901-6003</div>
                <div class="main" style="font-size:small;margin: 10px 0px;">Contact Us <a href="mailto:sales@discountedwheelwarehouse.com">sales@discountedwheelwarehouse.com</a></div>
            </div>
            <div class="footercustom-menu" align="center">
                <div class="zfooterMenu">
                    <ul>
                        <li><a href="/Custom_Wheels.cfm">Custom Wheels</a></li>
                        <li><a href="/Discount_Tires.cfm">Discount Tires</a></li>
                        <li><a href="/Wheel_and_Tire_information_links.cfm">Information Links</a></li>
                        <li><a href="/Apply_for_Credit.cfm">Rims Financing</a></li>
                        <li><a href="/Discounted_Wheel_Warehouse_Contact_us.cfm">Contact Us</a></li>
                        <li><a href="/Discounted_Wheel_Warehouse__About_Us__Customer_Service.cfm">About Us</a></li>
                        <li><a href="/wheels-search">Vehicle Search</a></li>
                        <li><a href="/index.cfm">Home</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-ratings" align="center">
                <h1><a href="">DiscountedWheelWarehouse.com has a ResellerRatings of 4.505/5 based on 8203 Reviews</a></h1>
            </div>
            <div class="copywright" align="center">copyright © 2020 Discounted Wheel Warehouse</div>

        </div>
    </div>
</section>

@include('include.latestproducts') @endsection @section('shop_by_vehicle_scripts')
<script src="{{ asset('js/wheels.js') }}"></script>
@endsection