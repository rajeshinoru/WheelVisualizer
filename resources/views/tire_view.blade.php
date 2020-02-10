@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> @endsection @section('content')

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
        font-weight:100;
        font-size: 14px;
        font-family: oswald !important;
    }

    .pTopCell.Phone a {
        color: #fff;
        text-decoration: none;
        font-size: 12px;
    }

    .product-details table.product-info {
        margin: 15px 0;
    }

    .product-name 
    {
        font-size: 14px !important;
        font-family: oswald !important;
        text-align: left;
        font-weight: 100 !important;
    }

    .product-info td {
        color: #222 !important;
        text-transform: uppercase;
        text-align: left;
        width: 200px !important;
        padding: 5px !important;
        font-family:play !important;
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
        height: 35px;
        line-height: 27px;
        padding: 0 6px;
        text-align: center;
        width: 50px;
    }

    #button-cart {
        height: 43px !important;
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

    .with-nav-tabs.panel-default .nav-tabs>li>a,
    .with-nav-tabs.panel-default .nav-tabs>li>a:hover,
    .with-nav-tabs.panel-default .nav-tabs>li>a:focus {
        color: #777;
    }

    .with-nav-tabs.panel-default .nav-tabs>.open>a,
    .with-nav-tabs.panel-default .nav-tabs>.open>a:hover,
    .with-nav-tabs.panel-default .nav-tabs>.open>a:focus,
    .with-nav-tabs.panel-default .nav-tabs>li>a:hover,
    .with-nav-tabs.panel-default .nav-tabs>li>a:focus {
        color: #777;
        background-color: #ddd;
        border-color: transparent;
    }

    .with-nav-tabs.panel-default .nav-tabs>li.active>a,
    .with-nav-tabs.panel-default .nav-tabs>li.active>a:hover,
    .with-nav-tabs.panel-default .nav-tabs>li.active>a:focus {
        color: #555;
        background-color: #fff;
        border-color: #ddd;
        border-bottom-color: transparent;
    }

    .with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu {
        background-color: #f5f5f5;
        border-color: #ddd;
    }

    .with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>li>a {
        color: #777;
    }

    .with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>li>a:hover,
    .with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>li>a:focus {
        background-color: #ddd;
    }

    .with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>.active>a,
    .with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>.active>a:hover,
    .with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>.active>a:focus {
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

    .prod-headinghome p 
    {
        margin: 10px 0px;
        color:#121214;
        font-size: 12px !important;
        line-height: 30px !important;
        font-family: play !important;
    }
    .prod-headinghome h1
    {
        font-family: oswald !important;
        font-size: 15px !important;
        font-weight: 100 !important;
        color:#0e1661 !important;
    }

    .general_info .price-section {
        margin: 0 0 5px;
        padding-bottom: 10px;
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
    }

    .form-group.product-quantity {
        padding: 10px 0px !important;
    }

    .product-info {
        margin: 10px 0px !important;
    }

    #table-section thead {
        background: #0e1661 !important;
        color: #fff !important;
        font-size: 12px !important;
        font-weight: 100 !important;
        font-family: oswald !important;
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
        font-family:oswald !important;
    }

    .btn.btn-default.cart-2 {
        border-radius: 0% !important;
        color: #fff !important;
        background: green;
        font-size: 10px !important;
        font-family:oswald !important;
    }

    .table.table-section th {
        text-align: center !important;
    }

    .table.table-section td {
        text-align: center !important;
        color: #000 !important;
        font-size: 12px !important;
        transition: 1s all;
        font-family: play !important;
    }

    .table.table-section td:hover {
        text-decoration: underline;
        transition: 1s all;
        color: blue !important;
        cursor: pointer;
    }

    .table>tbody>tr>td {
        border: 1px solid #ddd;
    }

    .btn.btn-default.cart-1:hover,
    .btn.btn-default.cart-2:hover {
        text-decoration: underline;
    }

    .tire-des h1,.tire-des h2 {
        font-size: 12px !important;
        margin: 0px;
        line-height: 30px;
        font-family:oswald !important;
    }

    .prograss-bar-head 
    {
        font-size: 10px;
        text-align: left;
        padding: 2px 0px !important;
        color: #0e1661 !important;
        margin: 0px 0px !important;
        font-family:play !important;
    }

    .progress.pro-bar {
        margin-bottom: 5px !important;
        height: 15px !important;
    }

    .col-sm-6.tire-details img {
        width: 100% !important;
        height: 300px;
    }

    .progress.pro-bar .progress-bar {
        font-size: 10px;
        line-height: 15px;
    }

    .benifit img {
        width: 100% !important;
    }

    .benifit-head 
    {
        font-size: 12px !important;
        font-weight: 100 !important;
        margin: 0px 0px !important;
        padding: 2px 0px;
        text-align: left;
        font-family: oswald !important;
    }

    .row.tire-benifit {
        padding: 5px 0px !important;
    }

    .benifit-title p {
        font-size: 12px !important;
        text-align: left;
        line-height: 25px !important;
        margin: 0px 0px;
        font-family: play !important;
    }

    .video img {
        width: 100% !important;
    }

    .instock-head a 
    {
        color:#ecb23d !important;
        font-family: oswald !important;
        font-size: 12px !important;
    }

    .youtube-video {
        margin: 20px 0px !important;
    }

    .instock-head {
        font-size: 12px !important;
        text-align: left;
        padding: 0px 0px !important;
        margin: 0px 0px !important;
        font-family: play !important;
    }

    .video img {
        width: 100% !important;
    }

    .btn.btn-info 
    {
        background: #ecb23d !important;
        font-family:oswald !important;
        font-size:12px !important;
    }

    .btn.btn-info:hover {
        background: #0e1661 !important;
    }

    .reward-block {
        padding: 10px 0px !important;
    }

    .modal-dialog.tire-view {
        width: 300px !important;
    }

    .form-group.has-success.has-feedback {
        margin: 0px 0px !important;
    }

    .modal-dialog.tire-view.btn.btn-info {
        margin: 10px 0px !important;
    }

    .form-group.has-success.has-feedback {
        margin: 10px 0px !important;
    }
    .col-sm-5.control-label 
    {
        color: #000 !important;
        font-family: oswald !important;
        font-size: 15px !important;
    }
    .modal-dialog.tire-view .modal-header
    {
        padding: 10px !important;
        border-bottom:none;
    }
    .animated {
        animation-duration: 2.5s;
        animation-fill-mode: both;
        animation-iteration-count: infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    .pulse {
        animation-name: pulse;
        animation-duration: 1s;
    }


</style>
<style>
    .price-section h1 {
        font-size: 14px !important;
        text-align: center;
        padding: 5px 0px !important;
        margin: 0px 0px !important;
        line-height: 30px;
    }

    .price-section h2 {
        font-size: 14px !important;
        padding: 5px 0px !important;
        margin: 0px 0px !important;
        line-height: 30px;
    }

    .reward-block {
        text-align: center !important;
    }

    .modal-dialog.tire-view .modal-header {
        background: #0e1661 !important;
    }

    modal-dialog.tire-view h4 {
        font-weight: 700;
        color: #fff;
        font-size: 12px !important;
    }

    .progress-title {
        font-size: 12px;
        color: #011627;
        margin: 10px 0px !important;
        text-align: left !important;
    }

    .progress {
        height: 10px;
        background: #cbcbcb;
        border-radius: 0;
        box-shadow: none;
        margin-bottom: 0px;
        overflow: visible;
    }

    .progress .progress-bar {
        box-shadow: none;
        position: relative;
        -webkit-animation: animate-positive 2s;
        animation: animate-positive 2s;
    }

    .progress .progress-value {
        font-size: 12px;
        color: #000;
        position: absolute;
        top: 10px;
        right: 0;
    }

    @-webkit-keyframes animate-positive {
        0% {
            width: 0;
        }
    }

    @keyframes animate-positive {
        0% {
            width: 0;
        }
    }
</style>
<section id="tires-des">
    <!-- Cart Start -->
    <div class="container">

        <div class="hometabled">
            <div class="pTopBar">
                <div class="pTopCell HotDeals">Hot Deals Save 30%-75%</div>
                <div class="pTopCell Phone"><a href="tel:1-800-901-6003" title="Telephone 1-800-901-6003">1-800-901-6003</a></div>
            </div>

            <div class="row">
                <div class="col-sm-3 tire-img">
                    <div class="tire-des">
                        <img src="{{viewImage('tires/'.@$tire->prodimage)}}">
                        <h1>Price for TIRE ONLY</h1>
                        <h2>Rim depicted in image NOT INCLUDED</h2>
                    </div>

                    @if(@$tire->badge1)
                    <img src="{{viewImage('tires/badges/'.@$tire->badge1)}}" width="70px" height="70px">
                    @endif
                    @if(@$tire->badge2)
                    <img src="{{viewImage('tires/badges/'.@$tire->badge2)}}" width="70px" height="70px">
                    @endif
                    @if(@$tire->badge3)
                    <img src="{{viewImage('tires/badges/'.@$tire->badge3)}}" width="70px" height="70px">
                    @endif
                </div>
                <div class="col-sm-3 shop-details">
                    <h1 class="product-name">{{@$tire->detailtitle}}</h1>
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

                    <table class="product-info">
                        <tbody>
                            <tr>
                                <td>{{@$tire->prodbrand}}</td>
                                <td class="product-info-value"><a href="">Size : {{@$tire->tiresize}}</a></td>
                            </tr>
                            <tr>
                                <td>{{@$tire->prodmodel}}</td>
                                <td class="product-info-value">Speed Rating : {{@$tire->speedrating}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="product-info-value">Load Index : {{@$tire->loadindex}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="product-info-value">UTQG : {{@$tire->utqg}}</td>
                            </tr>

                        </tbody>
                    </table>

                    <div class="price-section">
                        <h1>Partno : <b>{{@$tire->partno}}</b></h1>
                        <h2>Original Price : <span class="price-old">${{@$tire->originalprice}}</span>
                            You Save : <span class="price-new2">${{(@$tire->originalprice - @$tire->price)}}</span>
                        </h2>
                        <h1>Set of 4 : <span class="price-new2">${{@$tire->price * 4}}</span></h1>
                        <h1>Your Price : <span class="price-new2">${{@$tire->price}}</span></h1>
                        <div class="reward-block">
                            @if(@$tire->saletype == 4)
                            <button class="btn btn-info" type="button">See Price in Cart</button>
                            @elseif(@$tire->saletype == 5)
                            <button class="btn btn-info" type="button">Join DWW for Special Offers</button>
                            @elseif(@$tire->saletype == 7)
                            <button class="btn btn-info" type="button">See Price in Checkout</button>
                            @endif
                        </div>
                    </div>


                    <div class="form-group product-quantity">
                        <label class="control-label" for="input-quantity">Qty</label>
                        <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control">
                        <input type="hidden" name="product_id" value="46">
                        <button class="btn btn-info" type="button">Add to Cart</button>
                        <button class="btn btn-info" type="button">FINANCE</button>
                    </div>

                    <div class="instock">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <h1 class="instock-head">Availability:
                                        @if(@$tire->qtyavail == 1)
                                        <b>In Stock</b>
                                        @else
                                        <b>Low Stock - Call to Confirm</b>
                                        @endif
                                    </h1>
                                </div>
                                <div class="col-sm-6">
                                    <h1 class="instock-head animated pulse"><a href="" data-toggle="modal" data-target="#myModal">Shipping Quote</a></h1>
                                </div>
                                <!-- model Start -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog tire-view">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Shipping Quote</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group has-success has-feedback">
                                                        <label class="col-sm-5 control-label" for="inputSuccess">Ship To Zip</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="inputSuccess">
                                                        </div>
                                                    </div>
                                                </form>
                                                <button class="btn btn-info" type="button">Get Quote</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Model End  -->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3 tir-des">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="product-name">Performance Ratings</h1>

                            <h3 class="progress-title">Dry Handling / Dry Traction/ Dry Performance :</h3>
                            <div class="progress pink">
                                <div class="progress-bar" style="width:{{@$tire->dry_performance}}%; background:#0e1661;">
                                    <div class="progress-value">{{@$tire->dry_performance}}%</div>
                                </div>
                            </div>
                            <br>

                            <h3 class="progress-title">Wet Braking/ Wet Traction/ Wet Performance :</h3>
                            <div class="progress pink">
                                <div class="progress-bar" style="width:{{@$tire->wet_performance}}%; background:#0e1661;">
                                    <div class="progress-value">{{@$tire->wet_performance}}%</div>
                                </div>
                            </div>
                            <br>
                            <h3 class="progress-title">Tread Life/ Mileage/ Wear :</h3>
                            <div class="progress pink">
                                <div class="progress-bar" style="width:{{@$tire->mileage_performance}}%; background:#0e1661;">
                                    <div class="progress-value">{{@$tire->mileage_performance}}%</div>
                                </div>
                            </div>
                            <br>

                            <h3 class="progress-title">Ride Comfort:</h3>
                            <div class="progress pink">
                                <div class="progress-bar" style="width:{{@$tire->ride_comfort}}%; background:#0e1661;">
                                    <div class="progress-value">{{@$tire->ride_comfort}}%</div>
                                </div>
                            </div>
                            <br>
                            <h3 class="progress-title">Quiet Ride/ Noise Comfort/ Quietness :</h3>
                            <div class="progress pink">
                                <div class="progress-bar" style="width:{{@$tire->quiet_ride}}%; background:#0e1661;">
                                    <div class="progress-value">{{@$tire->quiet_ride}}%</div>
                                </div>
                            </div>
                            <br>

                            <h3 class="progress-title">Winter Performance/ Snow Traction/ Snow :</h3>
                            <div class="progress pink">
                                <div class="progress-bar" style="width:{{@$tire->winter_performance}}%; background:#0e1661;">
                                    <div class="progress-value">{{@$tire->winter_performance}}%</div>
                                </div>
                            </div>
                            <br>

                            <h3 class="progress-title">Fuel Efficiency / Eco:</h3>
                            <div class="progress pink">
                                <div class="progress-bar" style="width:{{@$tire->fuel_efficiency}}%; background:#0e1661;">
                                    <div class="progress-value">{{@$tire->fuel_efficiency}}%</div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row tire-benifit">
                        <div class="col-sm-12">
                            <div class="col-sm-4 benifit">
                                <img src="{{ViewBenefitImage(@$tire->benefitsimage1)}}">
                            </div>
                            <div class="col-sm-8 benifit-title">
                                <!-- <h1 class="benifit-head">WIDE ANGLED TREAD SLOT</h1> -->
                                <p>{{@$tire->benefits1}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row tire-benifit">
                        <div class="col-sm-12">
                            <div class="col-sm-4 benifit">
                                <img src="{{ViewBenefitImage(@$tire->benefitsimage2)}}">
                            </div>
                            <div class="col-sm-8 benifit-title">
                                <!-- <h1 class="benifit-head">WIDE ANGLED TREAD SLOT</h1> -->
                                <p>{{@$tire->benefits2}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row tire-benifit">
                        <div class="col-sm-12">
                            <div class="col-sm-4 benifit">
                                <img src="{{ViewBenefitImage(@$tire->benefitsimage3)}}">
                            </div>
                            <div class="col-sm-8 benifit-title">
                                <!-- <h1 class="benifit-head">WIDE ANGLED TREAD SLOT</h1> -->
                                <p>{{@$tire->benefits3}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row tire-benifit">
                        <div class="col-sm-12">
                            <div class="col-sm-4 benifit">
                                <img src="{{ViewBenefitImage(@$tire->benefitsimage4)}}">
                            </div>
                            <div class="col-sm-8 benifit-title">
                                <!-- <h1 class="benifit-head">WIDE ANGLED TREAD SLOT</h1> -->
                                <p>{{@$tire->benefits4}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Video Start -->
    <div class="container">
        <div class="row youtube-video">
            <div class="col-sm-12 tire-video">
                <div class="col-sm-3 video"><?php echo embedYoutube('https://www.youtube.com/watch?v=uobjGGIjV-Y')?>
                </div>
                <div class="col-sm-3 video"><?php echo embedYoutube('https://www.youtube.com/watch?v=TdR_KUfM1z0')?>
                </div>
                <div class="col-sm-3 video"><?php echo embedYoutube('https://www.youtube.com/watch?v=uobjGGIjV-Y')?>
                </div>
                <div class="col-sm-3 video"><?php echo embedYoutube('https://www.youtube.com/watch?v=TdR_KUfM1z0')?>
                </div>
                <!--                 <div class="col-sm-3 video"><img src="{{url('image/video.jpg')}}"></div>
                <div class="col-sm-3 video"><img src="{{url('image/video.jpg')}}"></div>
                <div class="col-sm-3 video"><img src="{{url('image/video.jpg')}}"></div> -->
            </div>
        </div>
    </div>
    <!-- Video End -->

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
                                            <br>
                                            <p><b>Details</b></p>
                                            <br>
                                            <p><b>Type</b>: {{@$tire->detaildesctype}}</p>
                                            <p><b>Style</b>: {{@$tire->prodmodel}}</p>
                                            <p><b>Feature</b>: {{@$tire->detaildescfeatures}}</p>
                                            <b>Description</b>:
                                            <br>
                                            <?php echo @$tire->proddesc ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="tire-des">
                                            <img src="{{viewImage('/tires/'.@$tire->prodimage)}}">
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
                        <th>Warranty</th>
                        <th>Per Tire</th>
                        <th>Add To Cart</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(@$diff_tires as $key => $tire)
                    <tr>
                        <td><a href="{{url('/tireview/'.base64_encode($tire->id))}}">{{@$tire->tiresize}}</a></td>
                        <td>{{@$tire->partno}}</td>
                        <td>{{@$tire->utqg?:'-'}}</td>
                        <td>{{@$tire->speedrating?:'-'}}</td>
                        <td>{{@$tire->loadindex?:'-'}}</td>
                        <td>{{@$tire->warranty?:'-'}}</td>
                        <!-- <td><img src="{{url('image/'.@$tire->warranty)}}" width="35px" height="35px"></td> -->
                        <td>${{@$tire->price}}</td>
                        <td>
                            <button type="button" class="btn btn-default cart-1">Details</button>
                            <button type="button" class="btn btn-default cart-2">Add</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>



<section id="falken-info">
    <div class="container">
        <a href=""><img src="http://127.0.0.1:8000/image/Falken-Company-Info.jpg" class="lazy ri" alt="Wheel Visualizer" width="100%" height="auto"></a>
    </div>
</section>

<section id="fal-feature">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="product-layouts">
                    <div class="product-thumb transition">
                        <div class="image">
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="http://127.0.0.1:8000/tireview/NA==">Falken Tires Ziex ZE950 A/S <br>
                                                                                        Starting at: $43.58
                                                                                        </a>
                                            </h4>
                                <br>
                            </div>
                            <div class="button-group">
                                <button class="btn-cart" type="button" title="Add to Cart" onclick="cart.add('46');"><i class="fa fa-shopping-cart"></i>
                                    <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span>
                                </button>
                                <button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('46');"><i class="fa fa-heart"></i>
                                    <span title="Add to Wish List">Add to Wish List</span>
                                </button>
                                <button class="btn-compare" title="Add to compare" onclick="compare.add('46');"><i class="fa fa-exchange"></i>
                                    <span title="Add to compare">Add to compare</span>
                                </button>
                                <button class="btn-quickview" type="button" title="Quick View"> <i class="fa fa-eye"></i>
                                    <span>Quick View</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="product-layouts">
                    <div class="product-thumb transition">
                        <div class="image">
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="http://127.0.0.1:8000/tireview/NA==">Falken Tires Ziex ZE950 A/S <br>
                                                                                        Starting at: $43.58
                                                                                        </a>
                                            </h4>
                                <br>
                            </div>
                            <div class="button-group">
                                <button class="btn-cart" type="button" title="Add to Cart" onclick="cart.add('46');"><i class="fa fa-shopping-cart"></i>
                                    <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span>
                                </button>
                                <button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('46');"><i class="fa fa-heart"></i>
                                    <span title="Add to Wish List">Add to Wish List</span>
                                </button>
                                <button class="btn-compare" title="Add to compare" onclick="compare.add('46');"><i class="fa fa-exchange"></i>
                                    <span title="Add to compare">Add to compare</span>
                                </button>
                                <button class="btn-quickview" type="button" title="Quick View"> <i class="fa fa-eye"></i>
                                    <span>Quick View</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="product-layouts">
                    <div class="product-thumb transition">
                        <div class="image">
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="http://127.0.0.1:8000/tireview/NA==">Falken Tires Ziex ZE950 A/S <br>
                                                                                        Starting at: $43.58
                                                                                        </a>
                                            </h4>
                                <br>
                            </div>
                            <div class="button-group">
                                <button class="btn-cart" type="button" title="Add to Cart" onclick="cart.add('46');"><i class="fa fa-shopping-cart"></i>
                                    <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span>
                                </button>
                                <button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('46');"><i class="fa fa-heart"></i>
                                    <span title="Add to Wish List">Add to Wish List</span>
                                </button>
                                <button class="btn-compare" title="Add to compare" onclick="compare.add('46');"><i class="fa fa-exchange"></i>
                                    <span title="Add to compare">Add to compare</span>
                                </button>
                                <button class="btn-quickview" type="button" title="Quick View"> <i class="fa fa-eye"></i>
                                    <span>Quick View</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="product-layouts">
                    <div class="product-thumb transition">
                        <div class="image">
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="http://127.0.0.1:8000/tireview/NA==">Falken Tires Ziex ZE950 A/S <br>
                                                                                        Starting at: $43.58
                                                                                        </a>
                                            </h4>
                                <br>
                            </div>
                            <div class="button-group">
                                <button class="btn-cart" type="button" title="Add to Cart" onclick="cart.add('46');"><i class="fa fa-shopping-cart"></i>
                                    <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span>
                                </button>
                                <button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('46');"><i class="fa fa-heart"></i>
                                    <span title="Add to Wish List">Add to Wish List</span>
                                </button>
                                <button class="btn-compare" title="Add to compare" onclick="compare.add('46');"><i class="fa fa-exchange"></i>
                                    <span title="Add to compare">Add to compare</span>
                                </button>
                                <button class="btn-quickview" type="button" title="Quick View"> <i class="fa fa-eye"></i>
                                    <span>Quick View</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="product-layouts">
                    <div class="product-thumb transition">
                        <div class="image">
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="http://127.0.0.1:8000/tireview/NA==">Falken Tires Ziex ZE950 A/S <br>
                                                                                        Starting at: $43.58
                                                                                        </a>
                                            </h4>
                                <br>
                            </div>
                            <div class="button-group">
                                <button class="btn-cart" type="button" title="Add to Cart" onclick="cart.add('46');"><i class="fa fa-shopping-cart"></i>
                                    <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span>
                                </button>
                                <button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('46');"><i class="fa fa-heart"></i>
                                    <span title="Add to Wish List">Add to Wish List</span>
                                </button>
                                <button class="btn-compare" title="Add to compare" onclick="compare.add('46');"><i class="fa fa-exchange"></i>
                                    <span title="Add to compare">Add to compare</span>
                                </button>
                                <button class="btn-quickview" type="button" title="Quick View"> <i class="fa fa-eye"></i>
                                    <span>Quick View</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="product-layouts">
                    <div class="product-thumb transition">
                        <div class="image">
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage//tires/Falken-Ziex-ZE950.jpg" title="Falken Tires Ziex ZE950 A/S" alt="Falken Tires Ziex ZE950 A/S" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="http://127.0.0.1:8000/tireview/NA==">Falken Tires Ziex ZE950 A/S <br>
                                                                                        Starting at: $43.58
                                                                                        </a>
                                            </h4>
                                <br>
                            </div>
                            <div class="button-group">
                                <button class="btn-cart" type="button" title="Add to Cart" onclick="cart.add('46');"><i class="fa fa-shopping-cart"></i>
                                    <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span>
                                </button>
                                <button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('46');"><i class="fa fa-heart"></i>
                                    <span title="Add to Wish List">Add to Wish List</span>
                                </button>
                                <button class="btn-compare" title="Add to compare" onclick="compare.add('46');"><i class="fa fa-exchange"></i>
                                    <span title="Add to compare">Add to compare</span>
                                </button>
                                <button class="btn-quickview" type="button" title="Quick View"> <i class="fa fa-eye"></i>
                                    <span>Quick View</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection @section('shop_by_vehicle_scripts')
<script src="{{ asset('js/wheels.js') }}"></script>

@endsection