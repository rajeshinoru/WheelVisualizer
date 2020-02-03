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
    
    #tires-des {
        padding: 40px 0px !important;
    }
    
    #special-product,
    .container.brand-logo,
    #bott,
    footer {
        display: none !important;
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
</style>

<style>
    #falken-des {
        padding: 40px 0px;
    }
    
    .fal-logo {
        text-align: center;
    }
    
    .prod-headinghome p {
        margin: 10px 0px;
        color: #121214;
        font-size: .875em;
        line-height: 25px;
    }
    
    .product-thumb h4 {
        font: 400 12px/25px "roboto", Helvetica, sans-serif;
        margin: 5px 0 10px;
        overflow: hidden;
        padding: 0;
    }
    
    .title-heading h2 {
        font-size: 18px !important;
        margin: 20px 0px !important;
    }
    
    .hometabled {
        display: table;
        text-align: center;
        width: 100%;
        background: #fff;
        margin: 25px 0px !important;
        padding: .5%;
        border-radius: 2px !important;
    }
    
    .col-sm-4.fal-logo img {
        padding: 10px 0px !important;
    }
</style>

</section>

<section id="falken-des">
    <div class="container">

        <div class="row">
            <div class="col-sm-8">
                <div class="prod-headinghome">
                    <p>Welcome to Discounted wheel Warehouse. We offer a huge selection of rims and tires to suit your needs. We carry 15 inch wheels all the way to a whopping 32 inch custom wheel. We offer quality discount tires at a price range for all. Don't miss our Closeout section as we have the best blowout deals to offer. Whether you're looking for rims or tires Discounted Wheel Warehouse has the best deal on the world wide web. We also have all the latest news and information on our Blog concerning custom wheels or car rims and all aspects of tires.</p>
                </div>
            </div>
            <div class="col-sm-4 fal-logo"><img src="image/falken-logo.png"></div>
        </div>
    </div>

    <div class="container">
        <div class="hometabled">
            <div class="row">
                <div class="title-heading">
                    <h2>Passenger Tires</h2></div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                <div class="col-sm-2">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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

        <div class="hometabled">
            <div class="row">
                <div class="title-heading">
                    <h2>Light Truck Tires</h2></div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire1.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire2.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire3.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                                <img class="wheelImage image_thumb" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="image/tire/tire4.jpg" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="">Falken Tires Ziex ZE950 A/S <br> Starting at: $43.58</a></h4>
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
                        <li><a href="">Custom Wheels</a></li>
                        <li><a href="">Discount Tires</a></li>
                        <li><a href="">Information Links</a></li>
                        <li><a href="">Rims Financing</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Vehicle Search</a></li>
                        <li><a href="">Home</a></li>
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