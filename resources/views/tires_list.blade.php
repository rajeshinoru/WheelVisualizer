@extends('layouts.app')
@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">
@endsection @section('content')

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

        .social2-nl {
            text-align: center;
        }
    }


    #tire-list {
        padding: 40px 0px;
    }

    .tire-type a {
        font-size: 12px !important;
    }
</style>
<style>
    .wrapper {
        width: 100%;
    }

    @media(max-width:992px) {
        .wrapper {
            width: 100%;
        }
    }

    .panel-heading {
        padding: 0;
        border: 0;
    }

    .panel-title>a,
    .panel-title>a:active {
        display: block;
        padding: 15px;
        color: #555;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        word-spacing: 3px;
        text-decoration: none;
    }

    .panel-heading a:before {
        font-family: 'Glyphicons Halflings';
        content: "\e114";
        float: right;
        transition: all 0.5s;
    }

    .panel-heading.active a:before {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .listing-sidebar .widget-search {
        padding: 20px;
    }

    ul {
        margin-bottom: 0px;
    }

    .listing-sidebar .widget-search ul li {
        margin: 5px 2px !important;
        list-style: none;
    }

    .listing-sidebar .widget-search ul li i {
        padding-right: 10px;
    }

    .listing-sidebar .widget-search ul li span {
        background: #db2d2e;
    }

    .listing-sidebar .widget-search ul li span {
        font-size: 12px;
        width: 30px;
        height: 30px;
        line-height: 30px;
        border-radius: 50%;
        color: #ffffff;
        background: #db2d2e;
        text-align: center;
        display: inline-block;
    }

    .widget-search {
        border: 1px solid #ccc;
    }

    ul.list-group li {
        list-style: none;
        position: relative;
    }

    .list-group-item:first-child {
        border-radius: 0px;
    }

    .list-group-item {
        border-left: 0;
        border-right: 0;
        padding: 13px 15px;
    }

    .listing-sidebar .widget-search {
        padding: 20px !important;
    }

    .list-style.-none {
        padding: 0px 0px !important;
    }

    .listing-sidebar h5 {
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }

    ul.list-group li {
        list-style: none;
    }

    .panel-body ul {
        list-style-type: none;
        padding: 0px 0px !important;
    }

    .widget-banner img {
        width: 100% !important;
    }

    .sorting-options-main {
        border: 1px solid #e3e3e3;
        padding: 20px;
    }

    #collapseOne,
    #collapseTwo {
        border: 1px solid #e2e4e7;
    }

    #headingOne,
    #headingTwo {
        border: 1px solid #ccc !important;
    }

    .widget-search {
        margin-bottom: 20px;
    }

    .heading {
        font-size: 13px !important;
    }

    .car-list ul li {
        border: 1px solid #e3e3e3;
        padding: 1px 10px;
        font-size: 12px;
        display: inline-block;
        margin-bottom: 0px;
    }

    .listing-sidebar #accordion .panel-title a {
        color: #000 !important;
        font-size: 13px !important;
        font-weight: 600;
    }

    #special-product,
    .container.brand-logo,
    #bott,
    footer {
        display: none !important;
    }
</style>

</section>





<section id="tire-list">
    <div class="container">
        <div class="col-sm-3">
            <!-- Side Start -->
            <div class="listing-sidebar">
                <div class="widget">
                    <div class="widget-search">
                        <div class="price-slide">
                            <div class="price">
                                <p><label for="price">Price range:</label>
                                    <input type="text" id="price" style="border:0; color:#b9cd6d; font-weight:bold;">
                                </p>
                                <div id="slider-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="wrapper center-block">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading active" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Shop By Brand</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <ul style="display: block;">

                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2009
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2010
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2011
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2012
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2013
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2014
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2015
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2016
                                                        </label>
                                                    </span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="widget-search">
                                <h5 class="heading">Speed Rating</h5>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><a>2016</a></li>
                                        <li><a>2016</a></li>
                                        <li><a>2016</a></li>
                                        <li><a>2016</a></li>
                                        <li><a>2016</a></li>
                                        <li><a>2016</a></li>
                                        <li><a>2016</a></li>
                                        <li><a>2016</a></li>
                                        <li><a>2016</a></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Load Index</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <ul style="display: block;">

                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2009
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2010
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2011
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2012
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2013
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2014
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2015
                                                        </label>
                                                    </span></li>
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> 2016
                                                        </label>
                                                    </span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="widget-banner">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="image/Banner.jpg" alt="Los Angeles">
                            </div>

                            <div class="item">
                                <img src="image/Banner-1.jpg" alt="Chicago">
                            </div>

                            <div class="item">
                                <img src="image/Banner-2.jpg" alt="New York">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Side End -->
        </div>
        <div class="col-sm-9">

            <div class="row">
                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

            <div class="row">
                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

            <div class="row">
                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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



<script>
    $(function() {
        $("#slider-3").slider({
            range: true,
            min: 0,
            max: 500,
            values: [35, 200],
            slide: function(event, ui) {
                $("#price").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#price").val("$" + $("#slider-3").slider("values", 0) +
            " - $" + $("#slider-3").slider("values", 1));
    });
</script>




@endsection