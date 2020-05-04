@extends('layouts.app') 
@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> 
@endsection 
@section('metakeywords')
<?=@MetaViewer('Home');?>
@endsection 
@section('content')

<!-- New Design Start -->
<style>
    .ban-ser {
        border: 1px solid #ddd9d9 !important;
    }

    .wheel-list {
        column-width: 15em;
        padding: 10px 15px !important;
    }

    .wheel-list li a {
        color: #474646;
        display: block;
        font-size: 12px !important;
        text-align: center;
        font-family: Montserrat !important;
    }

    .wheel-list ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .wheel-list li {
        padding: 3px;
        margin: 3px;
        margin-top: 3px;
        margin-top: 3px;
        border: 1px solid #ccc;
        box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, .05);
        background-color: #fff;
        border-radius: 2px !important;
    }

    .wheel-list ul li:first-child {
        margin-top: 0;
    }

    #heading h1 {
        font-family: Montserrat;
        color: #121214;
        font-size: 18px !important;
        text-align: center;
        font-weight: 700 !important;
    }

    .col-sm-3.payments3-card img {
        width: 100% !important;
    }

    .col-sm-3.payments-card {
        text-align: center !important;
    }

    .prod-headinghome p {
        margin: 10px 0px;
        color: #121214;
        line-height: 30px;
        font-family: poppins !important;
        font-size: 12px !important;
    }

    .col-sm-4.wheel-img {
        text-align: center !important;
    }

    /* pro Start */

    .hometabled {
        display: table;
        text-align: center;
        width: 100%;
        background: #fff;
        box-shadow: 0 2px 3px 0 rgba(180, 180, 180, .6) !important;
        border: 1px solid #d8d7d7;
        margin-bottom: 15px;
        padding: .5%;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
    }

    .pTopBar {
        display: table;
        width: 100%;
        padding: .5% 1%;
        margin-bottom: 1%;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        background: #0e1661 !important;
    }

    .pTopCell {
        display: table-cell;
        width: 50%;
        color: #fff;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .75);
        font-size: 12px;
        font-family: Montserrat !important;
    }

    .pTopCell.Phone a {
        color: #fff;
        text-decoration: none;
    }

    .asItems {
        border: 0px;
    }

    .asItems {
        padding: 0;
        padding-top: 0px;
        width: 100%;
        padding-top: 5px;
        text-align: center;
        margin: 0 auto 10px;
        background: #fff;
        border: 1px solid #cecece;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        box-shadow: 0 0 3px rgba(0, 0, 0, .125);
        font-family: open sans, Arial, sans-serif;
    }

    .asItems {
        text-align: center;
        font-family: open sans, Arial, sans-serif;
    }

    .gridList {
        margin: 0 auto;
        padding: 0;
        width: auto;
        display: table;
    }

    .gridItem {
        display: inline-block;
        width: 210px;
        text-align: center;
        padding: 5px;
    }

    .homecelld b {
        color: #222 !important;
        font-size: 12px !important;
        font-family: Montserrat !important;
    }

    .hometabled {
        margin: 25px 0px !important;
    }

    .gridList.wheels.suggested .gridItem homeapge1 {
        height: 180px;
    }

    .asItems {
        border: 0px;
    }

    .prod-headinghome h2 {
        color: #0e1661 !important;
        text-align: center;
        font-family: Montserrat !important;
        font-size: 18px !important;
        font-weight: 700 !important;
    }

    .prod-headinghome b {
        color: #0e1661 !important;
        font-family: Montserrat !important;
        font-size: 12px !important;
    }

    .prod-heading-center {
        text-align: center;
    }

    .prod-headinghome h3 {
        width: 100%;
        font-size: medium;
        font-family: open sans, Arial, sans-serif;
        color: #000 !important;
        font-weight: 600 !important;
        text-align: center;
    }

    .prod-heading-center p {
        color: #0e1661 !important;
        font-size: 15px;
        line-height: 30px !important;
        font-family: Montserrat !important;
        font-weight: 700 !important;
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
</style>
<!-- New Design End -->
<div class="header-content-title">
</div>
<div class="content-top">
    <div class="container-fluid">
        <div class="row">
            <div class="top-column col-sm-12">
                <div class="slideshow-panel col-sm-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="image/Banner.jpg" alt="Wheel">
                                <!-- Static Header -->
                                <div class="header-text hidden-xs">
                                    <div class="col-md-12 text-center">
                                        <h2><strong>WHEEL VISUALIZER</strong></h2>
                                        <br>
                                        <h3><span>Vividly Designed And Made For Speed.</span></h3>
                                        <br>
                                        <div class="">
                                            <a class="btn btn-theme btn-sm btn-min-block" href="#">CONTACT US</a><a class="btn btn-theme btn-sm btn-min-block" href="#">READ MORE</a></div>
                                    </div>
                                </div>
                                <!-- /header-text -->
                            </div>
                            <div class="item">
                                <img src="image/Banner-1.jpg" alt="Wheel">
                                <!-- Static Header -->
                                <div class="header-text hidden-xs">
                                    <div class="col-md-12 text-center">
                                        <h2><strong>WHEEL VISUALIZER</strong></h2>
                                        <br>
                                        <h3><span>Because So Much Is Riding Your Tires.</span></h3>
                                        <br>
                                        <div class="">
                                            <a class="btn btn-theme btn-sm btn-min-block" href="#">CONTACT US</a><a class="btn btn-theme btn-sm btn-min-block" href="#">READ MORE</a></div>
                                    </div>
                                </div>
                                <!-- /header-text -->
                            </div>
                            <div class="item">
                                <img src="image/Banner-2.jpg" alt="Wheel">
                                <!-- Static Header -->
                                <div class="header-text hidden-xs">
                                    <div class="col-md-12 text-center">
                                        <h2><strong>WHEEL VISUALIZER</strong></h2>
                                        <br>
                                        <h3><span>Give Your Car A True Custom Look.</span></h3>
                                        <br>
                                        <div class="">
                                            <a class="btn btn-theme btn-sm btn-min-block" href="#">CONTACT US</a><a class="btn btn-theme btn-sm btn-min-block" href="#">READ MORE</a></div>
                                    </div>
                                </div>
                                <!-- /header-text -->
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                    <!-- /carousel -->
                </div>
            </div>

        </div>
    </div>
</div>
<br>

@include('include.sizelinks')

<!-- Start - This is for Duynamic Products from database -->
<div class="container">

    <div class="hometabled">
        <div class="pTopBar">
            <div class="pTopCell HotDeals">Hot Deals Save 30%-75%</div>
            <div class="pTopCell Phone"><a href="tel:1-800-901-6003" title="Telephone 1-800-901-6003">1-800-901-6003</a></div>
        </div>

        <div class="asItems wheels">
            <ul class="gridList wheels suggested">

                @forelse($Wheels as $key => $wheel)

                <?php if($key == count($Wheels)/2 ) break; ?>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="{{asset(@$wheel->image)}}" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>{{$wheel->wheeldiameter}} Diameter</b></div>
                </li>

                @empty
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>17 inch Only $69</b></div>
                </li>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>18 inch Only $79</b></div>
                </li>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>20 inch Only $203</b></div>
                </li>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>22 inch Only $237</b></div>
                </li>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>24 inch Only $261</b></div>
                </li>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>26 inch Only $329</b></div>
                </li>

                @endforelse
            </ul>
        </div>
        <div class="asItems wheels">
            <ul class="gridList wheels suggested">

                @forelse($Wheels as $key => $wheel)

                <?php if($key < count($Wheels)/2 ) continue; ?>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="{{asset(@$wheel->image)}}" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>205/50R17 $45</b></div>
                </li>

                @empty
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>205/50R17 $45</b></div>
                </li>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>225/40R18 $50</b></div>
                </li>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>245/35R20 $60</b></div>
                </li>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>265/35R22 $100</b></div>
                </li>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>305/35R24 $125</b></div>
                </li>
                <li class="gridItem homeapge1">
                    <div class="homecelld">
                        <a href=""><img data-original="image/product.png" class="lazy ri" lazyload="1" alt="17 inch Car Rims" src="image/product.png" style="display: inline;" width="150" height="150"></a>
                    </div>
                    <div class="homecelld" style="margin-top: 4px;"><b>305/35R26 $125</b></div>
                </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
<!-- End - This is for Duynamic Products from database  -->



@if(Setting::get('homepage_content2'))
<div class="container">
    <?=Setting::get('homepage_content2','')?>
</div>
@else
<!---------------- Start - This Section will show when settings not found---------------->
<div class="container">
    <div class="prod-headinghome">
        <h2>We offer the hassle free fitment to make things EASY</h2>
        <p>Our Wheel Fitment Specialists or Tire Fitment Specialist can get you into those aftermarket wheels or tires fast. Our staff strives on giving the best service to our customers and have 20 years experience in wheel and tire fitment. We are the absolute authority on getting you fitted with the best choice of rims or tires for your Car, Truck or SUV. We offer online fitment that is quick and painless and will show you exactly which rims or tires will fit your vehicle.</p>
        <h2>Fast Shipping plus Low already Discounted Prices</h2>
        <p>Discounted Wheel Warehouse offers Fast Shipping on all its products. Whether your looking for some good quality cheap tires or just a set of car rims. We can get them to you quickly with our Fast shipping. Our price is already heavily discounted. No need to look elsewhere Discounted Wheel Warehouse will already have the best price for any wheels or wheel and tire package your looking for.</p>
        <h2>Home of the Wheel and Tire Package</h2>
        <p>Discounted wheel Warehouse is the home of the Wheel and Tire Package. We have been offering rims combined with tires also known as the "Wheel and Tire Package" since our existence. The best way to buy wheels and tire for your Car, Truck or SUV is a Wheel and Tire Package. We correctly fit the wheels using plus sizing, then correctly fit the plus sized tires for your vehicle. Our highly trained staff mounts and Road-Force Balances the wheels and tires for you into a wheel and tire package. All the customer has to do is dismount their stock/oem wheels and mount the wheels and tires right out of the box, it's super easy.</p>
        <h2>Full Range of rims and tires for every Car, Truck or SUV</h2>
        <p>We carry rims in the following sizes: 15 inch, 16 inch, 17 inch, 18 inch, 19 inch, 20 inch, 22 inch, 24 inch, 26 inch, 28 inch, 30 inch and a whopping 32 inch beast of a wheel. We have custom wheels, black wheels, off road wheels, staggered fitment wheels and 3 piece wheels. Our Tires range from 13 inch all the way to 32 inch. We have name brand high quality tires like Michelin, BFGoodrich all the way to Yokohama. We also carry a vast amount of Value low cost tires also known as cheap tires. We have brands like Fullrun and Lexani for our high quality discount tires.</p>
    </div>
    <div class="prod-headinghome">
        <h2>Useful Links for Custom Wheel Purchasing</h2>
        <p><a href=""><b>Package Deal</b></a> - This link has information about what comes with a wheel and tire package.</p>
        <p><a href=""><b>LOW or HIGH ?</b></a> - This link is information on how to determine if you have a FWD offset or a RWD offset on your Vehicle.</p>
        <p><a href=""><b>Lip Sizes</b></a> - Explains the difference in wheel lip sizes and what to expect when your wheel arrives.</p>
        <p><a href=""><b>Wheel Fitment</b></a> - This link explains Plus Sizing and how we are able to properly fit your rims and tires for your vehicle.</p>
        <p><a href=""><b>Offset and Bolt Patterns</b></a> - Reference to help aid in determining Bolt patterns and offsets for all vehicles.</p>
        <p><a href=""><b>Order Status</b></a> - View information on the status of your order.</p>
    </div>
    <div class="prod-heading-center">
        <p>Discounted Wheel Warehouse your best place to buy:</p>
        <p>Aftermarket Rims and Tires for your Car, Truck or Suv, Wheel and Tire Packages</p>
    </div>
</div>
<!---------------- End - This Section will show when settings not found---------------->
@endif

@endsection
@section('custom_scripts')
<!--  -->
@endsection