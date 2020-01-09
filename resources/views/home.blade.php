@extends('layouts.app')

@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">
@endsection

@section('content')

<div class="header-content-title">
</div>
<div class="content-top">
    <div class="container-fluid">
        <div class="row">
            <div class="top-column col-sm-12">
                <div class="slideshow-panel col-sm-12">
                    <!-- <div class="otloading-bg otloader"></div> -->
                    <div class="swiper-viewport">
                        <div id="slideshow0" class="gallery-top slideshow-main swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide text-center">
                                    <a>
                                        <img src="image/Banner.jpg" alt="slider-01" class="img-responsive" />
                                    </a>
                                </div>
                                <div class="swiper-slide text-center">
                                    <a>
                                        <img src="image/Banner.jpg" alt="slider-02" class="img-responsive" />
                                    </a>
                                </div>
                                <div class="swiper-slide text-center">
                                    <a>
                                        <img src="image/Banner.jpg" alt="slider-03" class="img-responsive" />
                                    </a>
                                </div>
                                <div class="swiper-slide text-center">
                                    <a>
                                        <img src="image/Banner.jpg" alt="slider-04" class="img-responsive" />
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-pagination slideshow0"></div>
                            <div class="swiper-pager">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>

                        <div id="slideshow0" class="gallery-thumbs slideshow-main swiper-container">
                            <!-- <div class="swiper-wrapper">
                                        <div class="swiper-slide text-center">
                                                    <a>
                                        <div class="title">slider-01</div>
                                        <img src="image/Banner.jpg" alt="slider-01" class="img-responsive" />
                                        </a>
                                                </div>
                                        <div class="swiper-slide text-center">
                                                    <a>
                                        <div class="title">slider-02</div>
                                        <img src="image/Banner.jpg" alt="slider-02" class="img-responsive" />
                                        </a>
                                                </div>
                                        <div class="swiper-slide text-center">
                                                    <a>
                                        <div class="title">slider-03</div>
                                        <img src="image/Banner.jpg" alt="slider-03" class="img-responsive" />
                                        </a>
                                                </div>
                                        <div class="swiper-slide text-center">
                                                    <a>
                                        <div class="title">slider-04</div>
                                        <img src="image/Banner.jpg" alt="slider-04" class="img-responsive" />
                                        </a>
                                                </div>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<br>
<!-- BAnner Down Sestion Start -->
<section id="produst">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 sub-head">
                <h1>All Products</h1>
            </div>
        </div>
        <div class="row main-pro">
            {{--<div class="col-sm-3">
                    <div class="header-bottom col-sm-12">
                        <aside id="header-bottom">
                            <div class="main-category-list left-main-menu">
                                <div class="cat-menu">
                                    <div class="OT-panel-heading active">ACCESSORIES</div>
                                    <div class="menu-category-" style="display: block;">
                                        <ul class="dropmenu">
                                            <li class="OT-Sub-List dropdown">
                                                <a href="" class="OT-Category-List">Asanti</a>
                                                <span class="active_menu"></span>
                                            </li>
                                            <li class="OT-Sub-List dropdown">
                                                <a href="" class="OT-Category-List">Forgiato</a>
                                                <span class="active_menu"></span>
                                            </li>
                                            <li class="OT-Sub-List dropdown">
                                                <a href="" class="OT-Category-List">Fuel</a>
                                                <span class="active_menu"></span>
                                            </li>
                                            <li class="OT-Sub-List dropdown">
                                                <a href="" class="OT-Category-List">Lexani</a>
                                                <span class="active_menu"></span>
                                            </li>
                                            <li class="OT-Sub-List dropdown">
                                                <a href="" class="OT-Category-List">Vossen</a>
                                                <span class="active_menu"></span>
                                            </li>
                                            <li class="OT-Sub-List dropdown">
                                                <a href="" class="OT-Category-List">Toyo</a>
                                                <span class="active_menu"></span>
                                            </li>
                                            <li class="OT-Sub-List dropdown">
                                                <a href="" class="OT-Category-List">Wheel</a>
                                                <span class="active_menu"></span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>

                </div>--}}

            <div class="col-sm-12 main-pro-inner">
                <div class="row">
                    @forelse($Wheels as $key => $wheel)
                    <div class="col-sm-4">
                        <div class="product-layouts">
                            <div class="product-thumb transition">
                                <div class="image">
                                    <img class="image_thumb" src="{{asset($wheel->image)}}" title="{{$wheel->brand}}" alt="{{$wheel->brand}}">
                                    <img class="image_thumb_swap" src="{{asset($wheel->image)}}" title="{{$wheel->brand}}" alt="{{$wheel->brand}}">
                                    <div class="sale-icon"><a>Sale</a></div>
                                </div>

                                <div class="thumb-description">
                                    <div class="caption">
                                        <h4><a href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($wheel->brand)))}}">{{$wheel->style}} <br> {{'Diameter : '.$wheel->wheeldiameter}}</a></h4>
                                        <!-- <h6><a href="">Accessories</a></h6> -->
                                        <!-- <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star off fa-stack-2x"></i></span>
                                            </div> -->
                                        <br>
                                        <!-- <div class="price">
                                                <span class="price-new">$104.00</span> <span class="price-old">$1,202.00</span>
                                                <span class="price-tax">Ex Tax: $85.00</span>
                                            </div> -->
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
                                        <button class="btn-quickview" type="button" title="Quick View" onclick="ot_quickview.ajaxView('index2ebe.html?route=product/product&amp;product_id=46')"> <i class="fa fa-eye"></i>
                                            <span>Quick View</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    {{'Not Found'}}
                    @endforelse
                    {{$Wheels->appends(['page' => @Request::get('page')])->links()}}

                </div>
                <br>
            </div>
        </div>
    </div>
</section>
<!-- BAnner Down Sestion End -->


<!--New Product Start  -->
<section id="special-product">
    <div class="container">
        <div class="col-sm-12 sub-head">
            <h1>Special Products</h1>
        </div>
        <div class="col-md-12">
            <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-success" href="#myCarousel" data-slide="prev"></a>
                    <a class="right fa fa-chevron-right btn btn-success" href="#myCarousel" data-slide="next"></a>
                </div>
                <div class="carousel-inner">
                    @forelse(wheelbrands($arraysplit=4) as $key1 => $brandImages)

                    <div class="item {{$key1==0? 'active' : ''}}">
                        @foreach($brandImages as $branddetail)
                        <div class="col-sm-3">
                            <div class="product-layouts">
                                <div class="product-thumb transition">
                                    <div class="image">
                                        <img class="image_thumb" src="{{asset($branddetail['image'])}}" title="{{$branddetail['brand']}}" alt="{{$branddetail['brand']}}">
                                        <img class="image_thumb_swap" src="{{asset($branddetail['image'])}}" title="{{$branddetail['brand']}}" alt="{{$branddetail['brand']}}">
                                        <div class="sale-icon"><a>Sale</a></div>
                                    </div>

                                    <div class="thumb-description">
                                        <div class="caption">
                                            <h4><a href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($branddetail['brand'])))}}">{{$branddetail['style'] }} <br> {{'Diameter : '.$branddetail['wheeldiameter']}}</a></h4>
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
                                            <button class="btn-quickview" type="button" title="Quick View" onclick="ot_quickview.ajaxView('index2ebe.html?route=product/product&amp;product_id=46')"> <i class="fa fa-eye"></i>
                                                <span>Quick View</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>
<!-- New Product End -->

<!-- New Latest News Start -->
<section id="special-product">
    <div class="container">
        <div class="col-sm-12 sub-head">
            <h1>Latest News</h1>
        </div>
        <div class="col-md-12">
            <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel2">
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-success" href="#myCarousel2" data-slide="prev"></a>
                    <a class="right fa fa-chevron-right btn btn-success" href="#myCarousel2" data-slide="next"></a>
                </div>
                <div class="carousel-inner">

                    @forelse(wheelbrands($arraysplit=3) as $key => $brandImages)
                    <div class="item {{$key==0? 'active' : ''}}">
                        @foreach($brandImages as $branddetail)
                        <div class="col-sm-4 news-pro">
                            <div class="col-sm-6 news-img"><img src="{{asset($branddetail['image'])}}" style="width: 100%;"></div>
                            <div class="col-sm-6">
                                <a href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($branddetail['brand'])))}}">
                                    <h2 class="news-title"><b>{{$branddetail['style']}}</b></h2>
                                    <h2 class="news-title">{{'Diameter : '.$branddetail['wheeldiameter']}}</h2>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @empty
                    <div class="item active">
                        <div class="row">
                            <div class="col-sm-4 news-pro">
                                <div class="col-sm-6 news-img"><img src="image/product.png"></div>
                                <div class="col-sm-6">
                                    <h1 class="news-date">01 JAN 2019</h1>
                                    <h2 class="news-title">Wheel</h2>
                                    <p class="news">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-sm-4 news-pro">
                                <div class="col-sm-6 news-img"><img src="image/product.png"></div>
                                <div class="col-sm-6">
                                    <h1 class="news-date">01 JAN 2019</h1>
                                    <h2 class="news-title">Wheel</h2>
                                    <p class="news">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-sm-4 news-pro">
                                <div class="col-sm-6 news-img"><img src="image/product.png"></div>
                                <div class="col-sm-6">
                                    <h1 class="news-date">01 JAN 2019</h1>
                                    <h2 class="news-title">Wheel</h2>
                                    <p class="news">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- New Latest News End -->

@endsection

@section('shop_by_vehicle_scripts')
<script src="{{ asset('js/wheels.js') }}"></script>
@endsection