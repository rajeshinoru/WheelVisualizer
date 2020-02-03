@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">

<link rel="stylesheet" href="{{ asset('css/js-image-slider.css') }}"> @endsection @section('content')

<style>
    .hometabled {
        margin: 25px 0px !important;
    }
    
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
        background: #000;
    }
    
    .pTopCell {
        display: table-cell;
        width: 50%;
        color: #fff;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .75);
        font-weight: 700;
        font-size: 12px;
    }
    
    .pTopCell.Phone a {
        color: #fff;
        text-decoration: none;
        font-size: 12px;
    }
    
    .product-details table.product-info {
        margin: 15px 0;
    }
    
    .product-name {
        font-size: 15px !important;
        text-align: left;
        font-weight: 700 !important;
    }
    
    .product-info td {
        color: #222 !important;
        text-transform: uppercase;
        text-align: left;
        width: 200px !important;
        padding: 5px !important;
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 12px;
    }
    
    .product-details .rating {
        display: table;
    }
    
    #button-cart {
        float: right;
        padding: 0px 20px !important;
        margin: 0px 7px !important;
        font-size: 12px !important;
    }
    
    .rating .product-rating {
        border-right: 1px solid #eaeaea;
        float: left;
        margin: 0 10px 0 0 !important;
        padding: 2px 10px 0 0;
        height: 20px;
    }
    
    .tire-price {
        border-top: 1px solid #eaeaea;
        border-bottom: 1px solid #eaeaea;
        padding: 15px 0;
        margin: 15px 0 20px;
        text-align: left;
    }
    
    .tire-price .price-new {
        float: left;
        margin: 0 8px 0 0;
    }
    
    .fa.fa-star.off.fa-stack-1x {
        color: #222 !important;
    }
    
    .product-options .product-quantity {
        clear: both;
        float: left;
        margin: 0;
    }
    
    .product-details #button-cart {
        background: #fed700;
        border-color: #fed700;
        color: #000000;
        float: left;
        font-family: "poppins", Helvetica, sans-serif;
        font-size: 14px;
        letter-spacing: 1px;
        line-height: 26px;
        padding: 7px 15px 6px 48px;
        position: relative;
        text-transform: capitalize;
    }
    
    .product-quantity #input-quantity {
        border: 1px solid #eaeaea;
        font-size: 14px;
        float: left;
        height: 43px;
        line-height: 27px;
        padding: 0 6px;
        text-align: center;
        width: 60px;
    }
    
    #button-cart {
        height: 43px !important;
    }
    
    .btn-block {
        width: auto !important;
    }
    
    .rating {
        padding: 10px 0px !important;
    }
    
    #demo-des {
        padding: 40px 0px !important;
    }
    
    #table-section {
        padding: 40px 0px !important;
        background: #f5f5f5;
    }
    
    .with-nav-tabs.panel-default .nav-tabs > li > a,
    .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
        color: #777;
    }
    
    .with-nav-tabs.panel-default .nav-tabs > .open > a,
    .with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
        color: #777;
        background-color: #ddd;
        border-color: transparent;
    }
    
    .with-nav-tabs.panel-default .nav-tabs > li.active > a,
    .with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
        color: #555;
        background-color: #fff;
        border-color: #ddd;
        border-bottom-color: transparent;
    }
    
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
        background-color: #f5f5f5;
        border-color: #ddd;
    }
    
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
        color: #777;
    }
    
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
        background-color: #ddd;
    }
    
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
        color: #fff;
        background-color: #555;
    }
    
    .tab-content.wheel-list-tab {
        margin-bottom: 0px !important;
    }
    
    .tab-content.wheel-list-tab .browser-default.custom-select {
        margin: 0px 30px !important;
        padding: 4px 40px !important;
    }
    
    .btn.vehicle-button {
        background: #000 !important;
        border-radius: 5px !important;
        color: #fff !important;
        font-size: 12px !important;
    }
    
    .font {
        padding: 0px 5px !important;
        color: #000 !important;
        margin: 0px 0px !important;
    }
    
    #tab5default .form-inline.mr-auto .form-control {
        margin: 0px 30px !important;
        padding: 4px 40px !important;
        border: 1px solid #7a7a7a !important;
    }
    
    .shop-details {
        margin: 10px 0px !important
    }
    
    #demo-des {
        background: #f5f5f5 !important;
    }
    
    .prod-headinghome p {
        margin: 10px 0px;
        color: #121214;
        font-size: .875em;
        line-height: 25px;
    }
    
    .general_info .price-section {
        margin: 0 0 5px;
        padding-bottom: 10px;
        border-bottom: 1px solid #dddddd !important;
    }
    
    .price-section span.price-new {
        font-size: 31px;
        color: #fd5503;
    }
    
    .price-section span.price-old {
        text-decoration: line-through;
        margin: 0 10px 0 0;
    }
    
    .price-old {
        color: #c2c2c2;
        font-size: 17px;
        line-height: 20px;
        text-decoration: line-through;
    }
    
    .price-section {
        text-align: left !important;
        border-bottom: 1px solid #ccc !important;
        padding: 15px 0px !important;
    }
    
    .form-group.product-quantity {
        padding: 10px 0px !important;
    }
    
    .product-info {
        margin: 10px 0px !important;
    }
    
    #table-section thead {
        background: #222 !important;
        color: #fff !important;
        font-size: 12px !important;
        font-weight: 100 !important;
    }
    
    .table.table-section {
        margin-bottom: 0px !important;
    }
    
    .table.table-section th {
        font-weight: 100 !important;
    }
    
    .btn.btn-default.cart-1 {
        border-radius: 0% !important;
        color: #fff !important;
        background: blue;
        font-size: 10px !important;
    }
    
    .btn.btn-default.cart-2 {
        border-radius: 0% !important;
        color: #fff !important;
        background: green;
        font-size: 10px !important;
    }
    
    .table.table-section th {
        text-align: center !important;
    }
    
    .table.table-section td {
        text-align: center !important;
        color: #000 !important;
        font-size: 12px !important;
        transition: 1s all;
    }
    
    .table.table-section td:hover {
        text-decoration: underline;
        transition: 1s all;
        color: blue !important;
        cursor: pointer;
    }
    
    .table > tbody > tr > td {
        border: 1px solid #ddd;
    }
    
    .btn.btn-default.cart-1:hover,
    .btn.btn-default.cart-2:hover {
        text-decoration: underline;
    }
</style>
</section>

<section id="tires-des">
    <!-- Cart Start -->
    <div class="container">

        <div class="hometabled">
            <div class="pTopBar">
                <div class="pTopCell HotDeals">Hot Deals Save 30%-75%</div>
                <div class="pTopCell Phone"><a href="tel:1-800-901-6003" title="Telephone 1-800-901-6003">1-800-901-6003</a></div>
            </div>

            <div class="row">
                <div class="col-sm-4 tire-img">
                    <div class="tire-des">
                        <!-- <img src="{{url('image/tire/tire1.jpg')}}"> -->
                        <div id="slider">
                            <a class="lazyImage" href="{{url('image/cart/banner-1.jpg')}}" title=""></a>
                            <a class="lazyImage" href="{{url('image/cart/banner-2.jpg')}}" title=""></a>
                            <a class="lazyImage" href="{{url('image/cart/banner-3.jpg')}}" title=""></a>
                            <a class="lazyImage" href="{{url('image/cart/banner-1.jpg')}}" title=""></a>
                            <a class="lazyImage" href="{{url('image/cart/banner-2.jpg')}}" title=""></a>
                        </div>

                        <div id="thumbs">
                            <div class="thumb"><img src="{{url('image/cart/thumb1.jpg')}}" /></div>
                            <div class="thumb"><img src="{{url('image/cart/thumb1.jpg')}}" /></div>
                            <div class="thumb"><img src="{{url('image/cart/thumb1.jpg')}}" /></div>
                            <div class="thumb"><img src="{{url('image/cart/thumb1.jpg')}}" /></div>
                            <div class="thumb"><img src="{{url('image/cart/thumb1.jpg')}}" /></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 shop-details">

                    <h1 class="product-name">{{@$tire->prod_title}}</h1>

                    <div class="rating-section product-rating-status text-left">
                        <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span> &nbsp;&nbsp;
                            <a href="">0 reviews</a> / <a>Write a review</a>
                        </div>
                    </div>

                    <div class="price-section">
                        <span class="price-new">${{@$tire->TireDetails->sale_price}}</span>
                        <span class="price-old">${{@$tire->TireDetails->price}}</span>
                        <div class="reward-block">
                        </div>
                    </div>

                    <table class="product-info">
                        <tbody>
                            <tr>
                                <td>Fullway :</td>
                                <td class="product-info-value"><a href="">Size {{@$tire->spec3}}</a></td>
                            </tr>
                            <tr>
                                <td>HP108 :</td>
                                <td class="product-info-value">Speed Rating : W</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="product-info-value">Load Index : 91</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="product-info-value">UTQG : 380AA</td>
                            </tr>
                        </tbody>
                    </table>

                    <div id="product" class="product-options">

                        <div class="form-group product-quantity">
                            <label class="control-label" for="input-quantity">Qty</label>
                            <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control">
                            <input type="hidden" name="product_id" value="46">
                            <button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block">Buy</button>
                            <button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block">Add to Cart</button>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4">
                    <!--  -->
                    <!--  -->
                </div>
            </div>
        </div>

    </div>
    <!-- Cart End -->
</section>

<section id="demo-des">
    <div class="container">
        <div class="wheel-list-tab">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1default" data-toggle="tab">Description</a></li>
                                <li><a href="#tab2default" data-toggle="tab">Shipping Information</a></li>
                                <li><a href="#tab3default" data-toggle="tab">Wheel and Tire Package</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content wheel-list-tab">
                                <div class="tab-pane fade in active" id="tab1default">
                                    <div class="col-sm-8">
                                        <div class="prod-headinghome">
                                            <p>{{$tire->TireDetails->meta_desc}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="tire-des">
                                            <img src="{{url('image/tire/tire1.jpg')}}">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="tab2default">
                                    <div class="prod-headinghome">
                                        <p>Welcome to Discounted wheel Warehouse. We offer a huge selection of rims and tires to suit your needs. We carry 15 inch wheels all the way to a whopping 32 inch custom wheel. We offer quality discount tires at a price range for all. Don't miss our Closeout section as we have the best blowout deals to offer. Whether you're looking for rims or tires Discounted Wheel Warehouse has the best deal on the world wide web. We also have all the latest news and information on our Blog concerning custom wheels or car rims and all aspects of tires.</p>
                                        <p>Welcome to Discounted wheel Warehouse. We offer a huge selection of rims and tires to suit your needs. We carry 15 inch wheels all the way to a whopping 32 inch custom wheel. We offer quality discount tires at a price range for all. Don't miss our Closeout section as we have the best blowout deals to offer. Whether you're looking for rims or tires Discounted Wheel Warehouse has the best deal on the world wide web. We also have all the latest news and information on our Blog concerning custom wheels or car rims and all aspects of tires.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3default">
                                    <div class="prod-headinghome">
                                        <p>Welcome to Discounted wheel Warehouse. We offer a huge selection of rims and tires to suit your needs. We carry 15 inch wheels all the way to a whopping 32 inch custom wheel. We offer quality discount tires at a price range for all. Don't miss our Closeout section as we have the best blowout deals to offer. Whether you're looking for rims or tires Discounted Wheel Warehouse has the best deal on the world wide web. We also have all the latest news and information on our Blog concerning custom wheels or car rims and all aspects of tires.</p>
                                        <p>Welcome to Discounted wheel Warehouse. We offer a huge selection of rims and tires to suit your needs. We carry 15 inch wheels all the way to a whopping 32 inch custom wheel. We offer quality discount tires at a price range for all. Don't miss our Closeout section as we have the best blowout deals to offer. Whether you're looking for rims or tires Discounted Wheel Warehouse has the best deal on the world wide web. We also have all the latest news and information on our Blog concerning custom wheels or car rims and all aspects of tires.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="table-section">
    <div class="container">
        <div class="table-responsive table-bordered">
            <table class="table table-section">
                <thead>
                    <tr>
                        <th>Trim Size</th>
                        <th>Part No</th>
                        <th>UTQG Rating</th>
                        <th>Speed Rating</th>
                        <th>Load Rating</th>
                        <th>Warrant</th>
                        <th>Per Tire</th>
                        <th>Add To Cart</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>215/45ZR17</td>
                        <td>Fullway Tires HP108</td>
                        <td>380 AA</td>
                        <td>W</td>
                        <td>91</td>
                        <td>-</td>
                        <td>$37.85</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Default</button>
                            <button type="button" class="btn btn-default cart-2">Default</button>
                        </td>
                    </tr>
                    <tr>
                        <td>215/45ZR17</td>
                        <td>Fullway Tires HP108</td>
                        <td>380 AA</td>
                        <td>W</td>
                        <td>91</td>
                        <td>-</td>
                        <td>$37.85</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Default</button>
                            <button type="button" class="btn btn-default cart-2">Default</button>
                        </td>
                    </tr>
                    <tr>
                        <td>215/45ZR17</td>
                        <td>Fullway Tires HP108</td>
                        <td>380 AA</td>
                        <td>W</td>
                        <td>91</td>
                        <td>-</td>
                        <td>$37.85</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Default</button>
                            <button type="button" class="btn btn-default cart-2">Default</button>
                        </td>
                    </tr>
                    <tr>
                        <td>215/45ZR17</td>
                        <td>Fullway Tires HP108</td>
                        <td>380 AA</td>
                        <td>W</td>
                        <td>91</td>
                        <td>-</td>
                        <td>$37.85</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Default</button>
                            <button type="button" class="btn btn-default cart-2">Default</button>
                        </td>
                    </tr>
                    <tr>
                        <td>215/45ZR17</td>
                        <td>Fullway Tires HP108</td>
                        <td>380 AA</td>
                        <td>W</td>
                        <td>91</td>
                        <td>-</td>
                        <td>$37.85</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Default</button>
                            <button type="button" class="btn btn-default cart-2">Default</button>
                        </td>
                    </tr>
                    <tr>
                        <td>215/45ZR17</td>
                        <td>Fullway Tires HP108</td>
                        <td>380 AA</td>
                        <td>W</td>
                        <td>91</td>
                        <td>-</td>
                        <td>$37.85</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Default</button>
                            <button type="button" class="btn btn-default cart-2">Default</button>
                        </td>
                    </tr>
                    <tr>
                        <td>215/45ZR17</td>
                        <td>Fullway Tires HP108</td>
                        <td>380 AA</td>
                        <td>W</td>
                        <td>91</td>
                        <td>-</td>
                        <td>$37.85</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Default</button>
                            <button type="button" class="btn btn-default cart-2">Default</button>
                        </td>
                    </tr>
                    <tr>
                        <td>215/45ZR17</td>
                        <td>Fullway Tires HP108</td>
                        <td>380 AA</td>
                        <td>W</td>
                        <td>91</td>
                        <td>-</td>
                        <td>$37.85</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Default</button>
                            <button type="button" class="btn btn-default cart-2">Default</button>
                        </td>
                    </tr>
                    <tr>
                        <td>215/45ZR17</td>
                        <td>Fullway Tires HP108</td>
                        <td>380 AA</td>
                        <td>W</td>
                        <td>91</td>
                        <td>-</td>
                        <td>$37.85</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Default</button>
                            <button type="button" class="btn btn-default cart-2">Default</button>
                        </td>
                    </tr>
                    <tr>
                        <td>215/45ZR17</td>
                        <td>Fullway Tires HP108</td>
                        <td>380 AA</td>
                        <td>W</td>
                        <td>91</td>
                        <td>-</td>
                        <td>$37.85</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Default</button>
                            <button type="button" class="btn btn-default cart-2">Default</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection 
@section('shop_by_vehicle_scripts')
<script src="{{ asset('js/wheels.js') }}"></script>

<script src="{{ asset('js/js-image-slider.js') }}"></script>
@endsection