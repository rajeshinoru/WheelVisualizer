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
        background: #0e1661 !important;
    }
    
    .pTopCell {
        display: table-cell;
        width: 50%;
        color: #fff;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .75);
        font-weight: 100;
        font-size: 14px;
        font-family: oswald !important;
    }
    
    .pTopCell.Phone a {
        color: #fff;
        text-decoration: none;
        font-size: 12px;
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
    
    #fal-feature {
        padding: 40px 0px !important;
    }
    
    .wheel-des h1,
    .wheel-des h2 {
        font-size: 12px !important;
        margin: 0px;
        line-height: 30px;
        font-family: oswald !important;
    }
    
    .prod-headinghome p {
        margin: 10px 0px;
        color: #121214;
        font-size: 12px !important;
        line-height: 30px !important;
        font-family: play !important;
    }
    
    .prod-headinghome h1 {
        font-family: oswald !important;
        font-size: 15px !important;
        font-weight: 100 !important;
        color: #0e1661 !important;
    }
    
    .row.wheel-view h1 {
        font-family: oswald !important;
        font-size: 18px !important;
        text-align: left;
        line-height: 30px !important;
    }
    
    .row.wheel-view h1:hover {
        text-decoration: underline !important;
        color: #0e1661 !important;
    }
    
    .wheel-des img {
        width: 100% !important;
    }
    
    #home h2,
    #menu1 h2 {
        margin: 0px 0px !important;
        font-family: oswald !important;
        color: #0e1661 !important;
        font-size: 14px !important;
        text-align: left;
        border-bottom: 1px solid #ccc !important;
        padding: 10px 0px !important;
    }
    
    tbody tr {
        text-align: left;
    }
    
    .table > tbody > tr > td {
        border-top: none !important;
        color: #000 !important;
    }
    
    td {
        font-size: 12px !important;
        font-family: play !important;
        padding: 5px 0px !important;
    }
    
    .table {
        margin-bottom: 0px !important;
    }
    
    .nav.nav-tabs li a:hover {
        background: transparent !important;
        color: #000 !important;
        border: none;
    }
    
    .nav.nav-tabs li a {
        border: none;
    }
    
    .nav > li > a:focus,
    .nav > li > a:hover {
        text-decoration: none;
        background: none !important;
        color: #000 !important;
        transition: none !important;
        border: none !important;
    }
    
    .nav.nav-tabs .tab-content {
        margin-bottom: 0px !important;
        padding: 0px 0px !important;
    }
    /* .nav-tabs > li > a
{
    border-bottom: 1px solid #0e1661 !important;
    transition: none !important;
} */
    
    .price-section h2 {
        font-size: 12px !important;
        text-align: center;
        padding: 5px 0px !important;
        margin: 0px 0px !important;
        line-height: 30px;
        font-family: play !important;
    }
    
    .price-section p {
        font-size: 12px !important;
        text-align: center;
        padding: 5px 0px !important;
        margin: 0px 0px !important;
        line-height: 30px;
        font-family: play !important;
        color: #000 !important;
    }
    
    .price-section span.price-old {
        text-decoration: line-through;
        margin: 0 10px 0 0;
    }
    
    .btn.btn-info {
        background: #ecb23d !important;
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
    
    .instock-head {
        font-size: 12px !important;
        margin: 0px;
        line-height: 30px;
        font-family: oswald !important;
    }
    
    .form-group.product-quantity {
        text-align: left;
    }
    
    .form-head {
        float: left;
    }
    
    .wheel_view.table-responsive {
        min-height: auto !important;
        overflow-x: visible !important;
    }
    
    #demo-des {
        background: #f5f5f5 !important;
        padding: 40px 0px !important;
    }
    
    .wheel-view-select {
        text-align: left;
        padding: 10px 0px !important;
    }
    
    .wheel_view_ship .btn.btn-info {
        margin: 10px 0px !important;
        width: 136px !important;
        border-radius: 2px !important;
    }
    
    .col-sm-9.wheel_view_list.nav-tabs > li.active {
        border-bottom: 1px solid #000;
    }
    
    .nav > li > a:focus,
    .nav > li > a:hover {
        text-decoration: none;
        background-color: #ecb23d !important;
        color: #fff !important;
        transition: 1s all;
    }
    
    .col-sm-4.wheel-View-but {
        margin: 10px 0px !important;
    }
    
    .new-model-button {
        border: 1px solid #eaeaea;
        padding: 15px;
        margin: 0px 0px !important;
    }
    
    .wheel_view_ship .btn:hover {
        background: #000 !important;
    }
    
    .wheel_view_ship .btn a {
        color: #fff !important;
        font-family: oswald !important;
        font-size: 12px !important;
    }
    
    .btn.btn-info {
        font-size: 12px !important;
        font-family: oswald !important;
    }
    
    .col-sm-12.wheel-view-select select {
        height: 30px !important;
        width: 150px !important;
        font-family: play !important;
        font-size: 12px !important;
    }
    .wheel-des .wheel-brand-img {
        width: 75% !important;
    }
    .wheel-brand-img2
    {
        width: 70% !important;
    }
    .col-sm-9.wheel_view_list .tab-content
    {
        margin-bottom:0px !important;
    }
    @media (max-width: 767px) {
        .row.wheel-view h1 {
            font-family: oswald !important;
            font-size: 16px !important;
            text-align: center;
            line-height: 30px !important;
        }
    }
    .activetab .nav-tabs li.active a
    {
        background-color: #ecb23d !important;
        color: #ffff;
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

                <div class="col-sm-3 wheel-img">
                    <div class="wheel-des">
                        <img src="{{asset(@$wheel->prodimage)}}" title="{{@$wheel->prodbrand}}" alt="{{@$wheel->prodbrand}}">
                        <h1>Lip Size Information</h1>
                        <img src="{{url('image/wheel-brand.png')}}" class="wheel-brand-img">
                    </div>
                </div>

                <div class="col-sm-9 wheel_view_list">
                    <div class="row wheel-view">
                        <h1>{{@$Wheel->prodtitle}}</h1>
                    </div>
                    <div class="row activetab">
                        <div class="col-sm-4">

                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">{{@$wheel->wheeldiameter}}</a></li>
                                <!-- <li><a data-toggle="tab" href="#menu1">22</a></li> -->
                            </ul>

                            <div class="tab-content">

                                <div id="home" class="tab-pane fade in active">
                                    <h2>Front & Rear</h2>
                                    {{--<div class="col-sm-12 wheel-view-select">
                                        <select id="">
                                            <option value="">22X9 32mm</option>
                                            <option value="">22X9 30mm</option>
                                        </select>
                                    </div>--}}
                                    <div class="table-responsive wheel_view">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Size</td>
                                                    <td>{{@$wheel->width.'x'.@$wheel->height}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Finish</td>
                                                    <td>{{@$wheel->prodfinish}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Offset</td>
                                                    <td>{{@$wheel->offset1.'mm'}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Hub Bore</td>
                                                    <td>{{@$wheel->hubbore.'mm'}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Brand</td>
                                                    <td>{{@$wheel->prodbrand}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{@explode('-',@$wheel->partno)[0]}}</td>
                                                </tr>
                                                <tr>
                                                    <td>PN</td>
                                                    <td>{{@$wheel->partno}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Bolt Pattern</td>
                                                    <td>{{--Fits 5x114 and 5x120 bolt patterns--}} {{@$wheel->boltpattern1.' '.@$wheel->boltpattern2.' '.@$wheel->boltpattern3}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div id="menu1" class="tab-pane fade">
                                    <h2>Front & Rear</h2>
                                    {{--<div class="col-sm-12 wheel-view-select">
                                        <select id="">
                                            <option value="">22X9 32mm</option>
                                            <option value="">22X9 30mm</option>
                                        </select>
                                    </div>--}}
                                    <div class="table-responsive wheel_view">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Size</td>
                                                    <td>{{@$wheel->width.'x'.@$wheel->height}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Finish</td>
                                                    <td>{{@$wheel->prodfinish}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Offset</td>
                                                    <td>{{@$wheel->offset1.'mm'}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Hub Bore</td>
                                                    <td>{{@$wheel->hubbore.'mm'}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Brand</td>
                                                    <td>{{@$wheel->prodbrand}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{@explode('-',@$wheel->partno)[0]}}</td>
                                                </tr>
                                                <tr>
                                                    <td>PN</td>
                                                    <td>{{@$wheel->partno}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Bolt Pattern</td>
                                                    <td>{{--Fits 5x114 and 5x120 bolt patterns--}} {{@$wheel->boltpattern1.' '.@$wheel->boltpattern2.' '.@$wheel->boltpattern3}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-4">
                            <img src="{{url('image/pay4.png')}}">
                            <img src="{{url('image/pay5.png')}}">
                            <!--  -->
                            <div class="price-section">
                                <h2>Original Price : <span class="price-old">${{@$wheel->saleprice ?? 0}}</span> 
                                You Save : <span class="price-new2">$0</span>
                            </h2>
                                <p>Set of 4 : <span class="price-new2">${{@$wheel->price*4}}</span></p>
                                <p>Your Price : <span class="price-new2">${{@$wheel->price}}</span></p>
                                <p>Starting at $15/mo with </p>
                                <div class="form-head">
                                    <div class="form-group product-quantity">
                                        <label class="control-label" for="input-quantity">Qty</label>
                                        <input type="text" name="quantity" value="{{@$wheel->qtyavail ?? 0}}" size="2" id="input-quantity" class="form-control">
                                        <input type="hidden" name="product_id" value="46">
                                        <button class="btn btn-info" type="button">Add to Cart</button>
                                    </div>
                                </div>
                                <h1 class="instock-head">Availability:<b>{{@$wheel->qtyavail ? 'In Stock' : 'Out Of Stock' }}</b></h1>
                            </div>
                            <!--  -->
                        </div>
                        <div class="col-sm-4 wheel-View-but">
                            <div class="new-model-button">
                                <img src="{{url('image/wheel-brand.png')}}" class="wheel-brand-img2">
                                <div class="wheel_view_ship">
                                    <button class="btn btn-info" type="button"><a>Shopping Cart</a></button>
                                </div>
                                <div class="wheel_view_ship">
                                    <button class="btn btn-info" type="button"><a>Finance Them</a></button>
                                </div>
                                <div class="wheel_view_ship">
                                    <button class="btn btn-info" type="button"><a>Wheel Visualizer</a></button>
                                </div>
                                <div class="wheel_view_ship">
                                    <button class="btn btn-info" type="button"><a>Will They Fit?</a></button>
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
                                            <h1><b>Details</b></h1>
                                            <!-- <br><b>Type</b>: {{@$tire->Passenger}} -->
                                            <p><b>Style</b>: {{@$tire->prodmodel}}</p>
                                            <!-- <br><b>Feature</b>: Exclusive silica compound. 3D canyon siping. Wide angled tread slot. Wide circumferential grooves -->
                                            <h1><b>Description</b>:</h1>
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

<section id="falken-info">
    <div class="container">
        <a href=""><img src="image/wheel-Company-Info.jpg" class="lazy ri" alt="Wheel Visualizer" width="100%" height="auto"></a>
    </div>
</section>

<section id="fal-feature">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="product-layouts">
                    <div class="product-thumb transition">
                        <div class="image">
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="">Falken Tires Ziex ZE950 A/S <br>
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
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="">Falken Tires Ziex ZE950 A/S <br>
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
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="">Falken Tires Ziex ZE950 A/S <br>
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
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="">Falken Tires Ziex ZE950 A/S <br>
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
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S">
                                                <a href="">Falken Tires Ziex ZE950 A/S <br>
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
                            <img class="wheelImage image_thumb" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <img class="wheelImage image_thumb_swap" src="http://127.0.0.1:8000/storage/wheels/KOKO_Dacono_BM_KO9835845861_20.jpg" title="" alt="" style="cursor: zoom-in;">
                            <div class="sale-icon"><a>Sale</a></div>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="tire-type" title="Falken Tires Ziex ZE950 A/S"><a href="">Falken Tires Ziex ZE950 A/S <br>
                                Starting at: $43.58</a></h4>
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